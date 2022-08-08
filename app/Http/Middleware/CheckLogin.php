<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 2) {
                if (Auth::user()->status == 1) {
                    return $next($request);
                }
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('form.getLogin')->with('error_incorrect','Tài khoản này đã bị khóa !');
            }else {
                if (Auth::user()->status == 1) {
                    return redirect()->route('client.home');
                }
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('form.getLogin')->with('error_incorrect','Tài khoản này đã bị khóa !');
            }
        }else{
            return redirect()->route('form.getLogin');
        }
    }
}
