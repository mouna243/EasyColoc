<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Colocation;
use App\Models\Expence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenceController extends Controller
{
    public function edit(Colocation $colocation, Expence $expence){
        return view('user.owner.edit-expence', compact('colocation', 'expence'));
    }
    public function store(Request $request, Colocation $colocation)
    {
        $request->validate([
            "name" => "required",
            "category_id" => "required",
            "montant" => "required"

        ]);

        $member_ship_id = $colocation->members()->where('user_id', Auth::user()->id)->first()->id;

        $expence = Expence::create([
            "name" => $request->name,
            "categorie_id" => $request->category_id,
            "montant" => $request->montant,
            "creator_id" => $member_ship_id,
            "colocation_id" => $colocation->id

        ]);

        $colocation->members
            ->each(function($member) use ($expence, $colocation){
                if($member->id != $expence->creator_id){
                    Balance::create([
                        "expence_id" => $expence->id,
                        "colocation_id" => $colocation->id,
                        "from_user_id" => $member->id,
                        "to_user_id" => $expence->creator_id,
                        "montant" => $expence->montant / $colocation->members->count(),
                    ]);
                }
            });


        return redirect()->back();
    }

    public function update(Request $request, Colocation $colocation, Expence $expence)
    {
        $request->validate([
            "name" => "required",
            "category_id" => "required",
            "montant" => "required"
        ]);

        $member_ship_id = $colocation->members()->where('user_id', Auth::user()->id)->first()->id;

        $expence->update([
            "name" => $request->name,
            "categorie_id" => $request->category_id,
            "montant" => $request->montant,
            "creator_id" => $member_ship_id,
            "colocation_id" => $colocation->id

        ]);

        $expence->balances()->delete();

        $colocation->members
            ->each(function($member) use ($expence, $colocation){
                if($member->id != $expence->creator_id){
                    Balance::create([
                        "expence_id" => $expence->id,
                        "colocation_id" => $colocation->id,
                        "from_user_id" => $member->id,
                        "to_user_id" => $expence->creator_id,
                        "montant" => $expence->montant / $colocation->members->count(),
                    ]);
                }
            });


        return redirect()->route('colocation.show', $colocation);
    }

    public function destroy(Request $request, Expence $expence)
    {
        $expence->delete();
        return redirect()->back();
    }


    public function show(Colocation $colocation , Expence $expence){
        return view("user.owner.expence-details" , compact("colocation" , "expence"));
    }
}
