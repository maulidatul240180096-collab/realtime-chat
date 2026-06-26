<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;   // TAMBAHKAN INI

class UpdateLastSeen
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            Log::info('UPDATE LAST SEEN JALAN: ' . Auth::user()->name); // TAMBAHKAN INI

            Auth::user()->update([
                'last_seen' => now()
            ]);

        }

        return $next($request);
    }
}