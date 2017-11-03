<?php

namespace App\Http\Middleware;

use Closure;

class registerInfo
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

        /*
        / Avoid leaving the creation view until the data is recorded.
        */
        if(auth()->user()->basicData)
        {
            return $next($request);
        }

        return redirect('company/create');
    }
}
