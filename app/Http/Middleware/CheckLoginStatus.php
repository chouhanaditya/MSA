<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckLoginStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            $email=Auth::user()->email;
            $user = User::where('email', $email)->first();
            $status=$user->status;

            if($status=="pending")
            {
                return redirect('/login');
            }
        }


        return $next($request);
    }
}
