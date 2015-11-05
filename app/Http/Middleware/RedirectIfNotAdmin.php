<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfNotAdmin
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
        $response = $next($request);

        if(Auth::user()){

            if( !$request->user()->isAdmin()){

                return redirect()->to('/');
            }

            return $response;
        }

        return redirect()->route('getLogin');


    }
}
