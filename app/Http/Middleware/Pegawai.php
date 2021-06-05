<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty(Auth::guard('pegawai')->id())) {
            return back()->with('error', 'Hanya pegawai yang bisa akses!');
        } else {
            return $next($request);
        }
        return back()->with('error', 'Hanya pegawai yang bisa akses');
    }
}
