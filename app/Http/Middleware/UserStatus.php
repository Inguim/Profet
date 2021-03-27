<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserStatus
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
        // dd(auth()->user()->status);
        if(auth()->user()->status === "aprovado") {
            return $next($request);
        }

        return redirect('message')->with('message', 'Você ainda não foi aprovado por um administrador, então não pode efetuar cadastros');
    }
}
