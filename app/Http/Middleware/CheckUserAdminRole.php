<?php

namespace App\Http\Middleware;

use App\Models\UserAdmin;
use Closure;

class CheckUserAdminRole
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
        $is_login = $request->session()->get('is_login');
        if ($is_login) {
            return $next($request);
        }
        return redirect('/user/login');
    }
}
