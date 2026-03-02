<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function signeView()
    {
        return view("auth.signe");
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credential = ["email" => $email, "password" => $password];

        if (Auth::attempt($credential)) {
            if(session()->has('invitation_token')){
                return redirect()->route('invitation.verify', session('invitation_token'));
            }
            return match (Auth::user()->role) {
                "admin" => redirect()->route("admin.index"),
                "user" => redirect()->route("colocation.index"),
                default => redirect()->route("signe.view")
            };
        }

        return redirect()->back();


    }

    public function signe(Request $request)
    {
       $request -> validate([
            "name" => "required|max:20",
            "email" =>"required|email",
            "password" =>"required|min:8"
        ]);

        $role = User::count() === 0 ? 'admin' : 'user';
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => $role
        ]);

        return redirect()->route('loginView');

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("loginView");
    }
}

