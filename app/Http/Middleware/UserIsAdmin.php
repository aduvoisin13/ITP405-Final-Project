<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

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
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->type == 'admin')
            {
                return $next($request);
            }
        }
        
        return redirect('admin');
    }
}
