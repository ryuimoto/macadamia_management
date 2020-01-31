<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\ShiftPettern;

class ShiftPetternController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        $patterns = ShiftPettern::where('user_id',$username->user('user')->id)->get();

        // dd($patterns);

        return view('user.shift_pettern')->with([
            'username' => $username->user('user')->name,
            'petterns' => $patterns,
        ]);
    }

    public function registration(Request $request)
    {
        dd($request->all());
    }
}
