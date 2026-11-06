<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogHttpLifecycle
{
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('=== Request recevied ===', [
            'method' => $request->method(),
            'url' => $request->url(),
            'input' => $request->all(),
        ]);


        $response = $next($request);

        \Log::info('=== Response sent ===', [
            'status' => $response->status(),
        ]);

        return $response;
    }
}
