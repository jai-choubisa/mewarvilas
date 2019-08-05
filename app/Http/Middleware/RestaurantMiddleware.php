<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class RestaurantMiddleware
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
        if(Auth::user()->hasRole('restaurant_owner')){
            return $next($request);
        }
        else{
            return redirect('home');
        }
    }
}
