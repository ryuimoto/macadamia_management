<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libraries\LoggedInUser;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        return view('user.dashboard')->with([
            'username' => $username->user('user')->name,
        ]);
        
        // return view('error.errors_404');
    }
}
