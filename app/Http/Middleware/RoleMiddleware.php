<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        // Pastikan user sudah login
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Cek apakah role ada dalam request
        if ($role && $request->user()->role !== $role) {
            return response()->json(['message' => 'Access Denied! You need role: ' . $role], 403);
        }

        return $next($request);
    }
}
