<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfUnverified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //ログイン済み かつ メール未認証なら誘導画面へ
        if (auth()->check() && ! auth()->user()->hasVerifiedEmail()) {
            if ($request->routeIs('verification.*')) {
                return $next($request);
            }

            return redirect()->route('verification.notice');
        }
        return $next($request);
    }
}
