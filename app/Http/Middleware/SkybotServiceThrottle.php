<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkybotServiceThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $maxAttempts = 5, $decayMinutes = 1): Response
    {
        $ip = $request->ip();
        $key = $this->throttleKey($ip);
        $attempts = Cache::get($key, 0);

        if ($attempts >= $maxAttempts) {
            return response()->json(['error' => 'Too many requests'], 429);
        }
        Cache::put($key, $attempts + 1, now()->addMinutes($decayMinutes));
        return $next($request);
    }

    protected function throttleKey(string $ip): string
    {
        return "throttle:{$ip}";
    }
    
}
