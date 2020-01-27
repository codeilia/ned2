<?php

namespace App\Http\Middleware;

use App\Response\MessageResponse;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsAdmin
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
        if (! Auth::user()->isAdmin()) {
            return MessageResponse::respondDanger(
                'شما دسترسی لازم را ندارید'
            );
        }

        return $next($request);
    }
}
