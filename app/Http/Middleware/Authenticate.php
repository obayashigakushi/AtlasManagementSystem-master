<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('loginView');
        }
        // 改修課題：タイムアウト時の遷移先をログイン画面へ（下記に書き換える）
        // if (! $request->expectsJson()) {
        //     return route('loginView');
        // }
    }
}
