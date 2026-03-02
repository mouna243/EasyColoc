<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function payed(Balance $balance){

        $balance->update([
                "status" => "payed"
        ]);

        return redirect()->back();
    }
}
