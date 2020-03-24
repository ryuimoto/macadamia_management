<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected function redirectTo()
    {
        return route('admin.dashboard');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }
    
    public function logout()
    {
        $this->guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
