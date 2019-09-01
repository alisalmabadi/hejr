<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
class LastUserActivity
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
        $user=\Auth::guard('web')->user();
        $expire_at = Carbon::now()->addMinutes(1);
        if(\Auth::guard('web')->check()){
            \Cache::put('user_is_online_'.md5($user->username),true,$expire_at);
        }
        return $next($request);
    }
}
