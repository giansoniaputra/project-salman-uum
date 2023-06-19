<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Access;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class setting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Role::where('name', auth()->user()->roles)->first();
        $setting = Access::where('role_unique', $role->unique)->where('menu_name', 'SETTING')->first();
        if (!$setting || auth()->user()->roles == "SUPER ADMIN") {
            if (auth()->user()->roles == "SUPER ADMIN") {
                return $next($request);
            }
            if (!$setting) {
                abort(403);
            } else {
                return $next($request);
            }
        }
        return $next($request);
    }
}
