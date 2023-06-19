<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class pembelian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Role::where('name', auth()->user()->roles)->first();
            $pembelian = Access::where('role_unique', $role->unique)->where('menu_name', 'PEMBELIAN')->first();
            if (!$pembelian || auth()->user()->roles == "SUPER ADMIN") {
                if (auth()->user()->roles == "SUPER ADMIN") {
                    return $next($request);
                }
                if (!$pembelian) {
                    abort(403);
                } else {
                    return $next($request);
                }
            }
            return $next($request);
        } else {
            return redirect('/auth')->with('error', 'Anda Harus Login Terlebih Dahulu!');
        }
    }
}
