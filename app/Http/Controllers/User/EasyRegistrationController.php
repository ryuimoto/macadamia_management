<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;

use App\Shift;

class EasyRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        return view('user.easy_registration')->with([
            'username' => $username->user('user')->name,
        ]);
    }

    public function registration(Request $request)
    {
        // バリデーション　一旦外す
        // $request->validate([
        //     'attendance' => 'nullable|required|before:leaving',
        //     'leaving' => 'nullable|required',
        //     'weekday' => 'nullable|required',
        // ]);

        // $carbon = Carbon::now();

        dd($request->all());
        
        // Shift::create([
        //     'attendance' => ,
        //     'leaving' => ,
        //     'date' => ,
        // ]);        

    }
}
