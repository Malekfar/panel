<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if($user->level == 0)
            return $next($request);
        if($user->level >= 4 || !$user->hasPermissionTo($request->method()."-/".$request->route()->uri))
            return abort(404);
        return $next($request);
    }
}
