<?php

namespace App\Http\Middleware;

use Closure;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $request->validate([
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|email|min:8',
        ]);
        return $next($request);
    }
}
