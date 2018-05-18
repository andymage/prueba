<?php

namespace App\Http\Middleware;

use Closure;

class PermisoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permisos = $request->user()->verificaPermiso();
        $path = $request->path();
        $explode = explode('/', $path);
        if (isset($explode[0]) and isset($explode[1])) {
            $path = $explode[0] . '/' . $explode[1];
        }
        if (!in_array($path, $permisos)) {
            abort(403, "¡No tienes Permisos!.");
        }
        return $next($request);
    }
}
