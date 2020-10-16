<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::user() == null ){
            return redirect('login');
        }else if ($request->user()->role > $role) {
            abort(403, 'No tienes autorización para ingresar.');
        }
        return $next($request);
    }
}
