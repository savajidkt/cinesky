<?php

namespace App\Http\Middleware;

use App\Models\UserSurvey;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckSurveyStatus
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
        $user   = auth()->user();
        $survey = $user->survey;
        if(empty($user->gender) || !$user->gender){
            return redirect()->route('demographic');
        }
        if (isset($survey))
        {
            if(in_array($survey->status, [UserSurvey::COMPLETED]))
            {
                if( !Route::is('thank-you') || Route::is('take-survey') )
                {
                    return redirect()->route('thank-you');
                }
            }
            else if( $survey->auto_stop == UserSurvey::YES )
            {
                if( !Route::is('time-out') || Route::is('take-survey') )
                {
                    return redirect()->route('time-out');
                }
            }
            else
            {
                if( !Route::is('take-survey') )
                {
                    return redirect()->route('home');
                }
            }
        }
        return $next($request);
    }
}
