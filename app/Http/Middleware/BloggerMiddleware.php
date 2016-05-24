<?php

namespace App\Http\Middleware;

use Closure;

class BloggerMiddleware
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
        if(\Auth::guest() || !$request->user()->isBlogger())
        {
            flash()->error('Nie masz dostępu do tego panelu.');
            return redirect('/');
        }
        return $next($request);
    }
}
