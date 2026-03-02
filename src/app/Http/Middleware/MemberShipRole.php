<?php

namespace App\Http\Middleware;

use App\Models\MemberShip;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberShipRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user_role = MemberShip::where('user_id', Auth::user()->id)
        ->whereNull('left_at')
        ->whereHas('colocation', function($query){
            $query->where('status', 'active');
        })->first()->role;

        if($user_role != $role){
            return redirect()->back();
        }
        return $next($request);
    }
}
