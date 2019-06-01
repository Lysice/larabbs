<?php

namespace App\Http\Middleware;

use Closure;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * 1.如果用户已经登录
     * 2.并且还没认证Email
     * 3.并且访问的不是email验证相关url 或者退出url
     * 则跳转到提醒页面
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() &&
            ! $request->user()->hasVerifiedEmail() &&
            ! $request->is('email/*', 'logout')
            ) {
            return $request->expectsJson()
                ? abort(403, '您的邮件暂未认证!')
                : redirect()->route('verification.notice');

        }
        return $next($request);
    }
}
