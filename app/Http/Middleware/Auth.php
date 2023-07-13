<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
       if(!Auth::check()) {
        if (Auth::user()->status == '1') {
            if (Auth::user()->level == 'admin') {
                return redirect('dashboard');
            } elseif (Auth::user()->level == 'perusahaan') {
                return redirect('dashboard');
            } elseif (Auth::user()->level == 'alumni') {
                return redirect('home');
            } elseif (Auth::user()->level == 'pencaker') {
                return redirect('home');
            }
        }else{
            return redirect('/')->with('fail','true');

        }
       }
       $user = Auth::user();

       if($user->level == $roles)
       return $next($request);

       return redirect('/')->with('fail','Anda harus login terlebih dahulu');
    }
}
