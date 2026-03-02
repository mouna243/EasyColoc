<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\MemberShip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    public function index(){
        $colocations = MemberShip::where("user_id" , Auth::user()->id)
        ->with('colocation.owner')
        ->get()
        ->map(function ($member){
            if($member->left_at){
                $member->colocation->status = 'deactive';
            }
            return $member->colocation;
        });

        return view("user.colocation", compact("colocations"));

    }

    public function add(Request $request){

        $request->validate([
            "group_name" => "required|max:30" ,
        ]);

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
            return redirect()->back() ;
        }

        $colocation = Colocation::create(
            [
                "group_name" => $request->group_name,
            ]
        );

        MemberShip::create([
            "user_id" => Auth::user()->id,
            "colocation_id" => $colocation->id,
            "role" => "owner"
        ]);

        return redirect()->back() ;
    }

    public function show(Colocation $colocation ){

        $member_ship_id = $colocation->members()->where('user_id', Auth::user()->id)->first()->id;

        $colocation->members->each(function ($member) use ($colocation, $member_ship_id){
            if($member->id != $member_ship_id){
                $total_from = $colocation->balances()->where('from_user_id', $member_ship_id)
                    ->where("to_user_id", $member->id)
                    ->where('status', 'pending')->sum('montant');

                $total_to = $colocation->balances()->where('from_user_id', $member->id)
                    ->where("to_user_id", $member_ship_id)
                    ->where('status', 'pending')->sum('montant');

                $member->total_final = $total_to - $total_from;
            }
        });

        $colocation->members = $colocation->members->filter(fn ($member) => $member->total_final);

        return view('user.owner.index' , compact("colocation"));
    }

    public function anuller(Colocation $colocation){
        $colocation->update(['status' => 'deactive']);
        return redirect()->back() ;
    }

    public function members(Colocation $colocation){
        $colocation->load('members.user');
        $members = $colocation->members->filter(fn ($member) => is_null($member->left_at));
        return view('user.owner.members', compact('colocation', 'members'));
    }

    public function retirer(Colocation $colocation, MemberShip $member){
        $member->update([
            "left_at" => now()
        ]);

        return redirect()->route('colocation.show', $colocation);
    }

    public function quitter(Colocation $colocation){
        $colocation->members()->where('user_id', Auth::user()->id)
        ->update([
            "left_at" => now()
        ]);

        return redirect()->route('colocation.index');
    }

}

