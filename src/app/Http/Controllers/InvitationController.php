<?php

namespace App\Http\Controllers;

use App\Mail\InvitationEmail;
use App\Models\Colocation;
use App\Models\Invitation;
use App\Models\MemberShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index(Colocation $colocation){
        return view('user.owner.invitation', compact('colocation'));
    }

    public function envoyer(Request $request, Colocation $colocation){
        $request->validate([
            "email" => "required|email"
        ]);

        $token = Str::uuid();

        Invitation::create([
            "email" => $request->email,
            "token" => $token,
            "colocation_id" => $colocation->id
        ]);

        Mail::to($request->email)->send(
            new InvitationEmail($token)
        );

        return redirect()->route('colocation.show', $colocation);
    }

    public function verify(string $token){
        if(!Auth::check()){
            session(["invitation_token" => $token]);
            return redirect()->route('loginView');
        }

        $invitation = Invitation::where("token", $token)
        ->where('email', Auth::user()->email)
        ->whereNull('used_at')->first();

        if(!$invitation){
            return redirect()->route('invitation.invalid');
        }

        $colocation = Colocation::find($invitation->colocation_id);

        return redirect()->route('colocation.invitation.valid', $colocation);
    }

    public function invalid(){
        return view('invitation.invalid');
    }

    public function valid(Colocation $colocation){
        return view('invitation.valid', compact('colocation'));
    }

    public function accepter(Colocation $colocation){

        $count = MemberShip::where("user_id" , Auth::user()->id)
            ->whereNull('left_at')
            ->with('colocation')
            ->whereHas('colocation', function($query){
                $query->where('status', 'active');
            })
            ->get()
            ->map(fn ($member) => $member->colocation)
            ->count();

        if($count > 0){
            return redirect()->route('invitation.invalid');
        }

        $memberShip = MemberShip::where('user_id', Auth::user()->id)
        ->whereNotNull('left_at')->first();

        if($memberShip){
            $memberShip->update([
                "left_at" => null
            ]);
        }else{
            MemberShip::create([
                "user_id" => Auth::user()->id,
                "colocation_id" => $colocation->id,
                "role" => "member"
            ]);
        }

        Invitation::where("email", Auth::user()->email)
        ->where('colocation_id', $colocation->id)
        ->update(['used_at' => now()]);

        return redirect()->route('colocation.show', $colocation);
    }

    public function refuser(Colocation $colocation){

        Invitation::where("email", Auth::user()->email)
        ->where('colocation_id', $colocation->id)
        ->update(['used_at' => now()]);

        return redirect()->route('colocation.index');
    }
}
