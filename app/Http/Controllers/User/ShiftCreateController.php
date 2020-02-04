<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use App\Status;

class ShiftCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();
        
        return view('user.shift_create')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
        ]);
    }

    public function create(Request $request)
    {
        // dd($request);

        return $request;
    }

}
