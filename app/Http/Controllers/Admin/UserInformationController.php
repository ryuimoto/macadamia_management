<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserInformationController extends Controller
{
    public function index()
    {
        return view('admin.user_infomation')->with([
            'users' => User::get(),
        ]);
    }
}
