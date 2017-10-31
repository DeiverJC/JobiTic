<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->user()->basicData;
        //dd(empty($data->business_name));
        if($data->business_name != ''){
             return redirect('company/create');
        }

        return $next($request);
    }
}
