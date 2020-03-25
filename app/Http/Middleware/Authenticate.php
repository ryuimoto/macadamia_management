<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    protected $guards = [];

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */

    public function handle($request, Closure $next, ...$guards)
    {
        // guardを変数に退避
        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }
    
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if(in_array('user', $this->guards, true)) {
            return route('user.login');
        }
        elseif (in_array('admin', $this->guards, true)) {
            return route('admin.login');
        }
        else {
            // 上記以外の場合は、ログインが不要なページに移動
            return route('home');
        }

    }
}
