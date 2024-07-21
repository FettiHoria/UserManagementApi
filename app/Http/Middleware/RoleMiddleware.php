<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bearer = $request->header('Authorization');
        if(!is_null($bearer)){
        $bearer = str_replace('Bearer ', '', $bearer);
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($bearer);
        $user = $token->tokenable;
        if ($user->role == 'admin')
        return $next($request);

        }

    }
}
