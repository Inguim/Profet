<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(! auth()->user()->admin) {
            return abort(403, 'Você não pode acessar essa área');
        }

        return $next($request);

    }
}
