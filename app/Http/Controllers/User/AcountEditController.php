<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\User;
use App\Status;

class AcountEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        $statuses = Status::get();
        $status = Status::where('id',$username->user('user')->status_id)->first();

        return view('user.acount_edit')->with([
            'username' => $username->user('user')->name,
            'name' => $username->user('user')->name,
            'status_ids' => $username->user('user')->status_id,
            'statuses' => $statuses,
            'status' => $status,
            'email' => $username->user('user')->email,
        ]);
    }

    public function edit(Request $request)
    {

        dd($request->all());

        $username = new LoggedInUser;

        $request->validate([
            'name' => 'required',
            'status_id' => 'required',
            'email' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        User::where('id',$username->user('user')->id)
        ->update([
            'name' => $request->name,
            'status_id' => $request->status_id,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
        ]);

        return back();

    }
}
