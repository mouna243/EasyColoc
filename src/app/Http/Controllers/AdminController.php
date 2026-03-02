<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        $user_banned = User::where("banned", true)->count();
        $user_active = User::where("banned", false)->count();
        return view("admin.index" , compact("users","user_banned" , "user_active"));
    }
    public function banne(User $user)
    {
        $user->update([
            "banned" => true,
        ]);
        return redirect()->back();
    }

    public function unbanne(User $user)
    {
        $user->update([
            "banned" => false,
        ]);
        return redirect()->back();
    }
}
