<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$types
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
         if ( !in_array(Auth::user()->type->value, $types)) {
           // dd( $types); client
           //dd(Auth::user()->type);
             return redirect()->route('error403');
         }
        return $next($request);
    }
}
