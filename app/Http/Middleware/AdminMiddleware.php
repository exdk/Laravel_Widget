<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $uid = Auth::user()->id;
        $role = \DB::table('role_user')
            ->where('role_user.user_id','=',$uid)
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('roles.id as roleid', 'roles.title as rtitle')
            ->first();
        if($role->roleid != '1') {
            return redirect('admin/my_tickets');
        }

        return $next($request);
    }
}
