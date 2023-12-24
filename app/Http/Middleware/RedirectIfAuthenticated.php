<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        $webRoute = Route::getCurrentRoute()->getAction('authGrouping') === 'users.auth';
        
        foreach ($guards as $guard) {
           
            if (Auth::guard($guard)->check()) {
                if($webRoute){
                    return redirect(RouteServiceProvider::HOME);
                }

                return redirect(RouteServiceProvider::adminHOME);    
            }
        }
        //dd(Auth::guard($guard)->check());
        return $next($request);
    }
}
