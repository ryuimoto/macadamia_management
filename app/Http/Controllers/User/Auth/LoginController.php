<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return route('user.dashboard');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function logout()
    {        
        $this->guard('user')->logout();

        return redirect()->route('user.login');
    }
}
