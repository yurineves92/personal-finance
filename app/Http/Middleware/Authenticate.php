<?php

namespace FinanceiroPessoal\Http\Middleware;

use Closure;
use Auth;

class Authenticate
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
        if(!$request->is('login') && Auth::check()) {
			return redirect('login');
		}
		return $next($request);
    }
}
