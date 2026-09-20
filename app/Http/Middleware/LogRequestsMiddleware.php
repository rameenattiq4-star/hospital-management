<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // Request Log
        Log::info('REQUEST RECEIVED', [
            'url'      => $request->fullUrl(),
            'method'   => $request->method(),
            'ip'       => $request->ip(),
            'user_id'  => optional($request->user())->id ?? 'Guest',
        ]);

        $response = $next($request);

        $duration = round((microtime(true) - $startTime) * 1000, 2);

        // Response Log
        Log::info('RESPONSE SENT', [
            'url'      => $request->fullUrl(),
            'status'   => $response->getStatusCode(),
            'duration' => $duration . ' ms',
        ]);

        return $response;
    }
}