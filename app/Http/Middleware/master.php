<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Access;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class master
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Role::where('name', auth()->user()->roles)->first();
        $master = Access::where('role_unique', $role->unique)->where('menu_name', 'MASTER')->first();
        if (!$master || auth()->user()->roles == "SUPER ADMIN") {
            if (auth()->user()->roles == "SUPER ADMIN") {
                return $next($request);
            }
            if (!$master) {
                abort(403);
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}
