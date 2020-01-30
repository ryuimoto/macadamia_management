<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

class ShiftPetternController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        
        return view('user.shift_pettern')->with([
            'username' => $username->user('user')->name,
        ]);
    }
}
