<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    protected $allowedOrigins = [
        'http://localhost:5173',
        'http://localhost:3000', // Add this line to allow requests from another frontend port
    ];

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $origin = $request->header('Origin');

        if (in_array($origin, $this->allowedOrigins)) {
            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return $response;
    }
}