<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $user = Auth::user();
            if(!$user->last_seen_at || $user->last_seen_at->diffInMinutes(now())>=1) {
                DB::table('users')->where('id', $user->id)->update(['last_seen_at' => now()]);
            }
        }
        return $next($request);
    }
}
