<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\Status;
use App\ShiftPettern;

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

        $shift_petterns = ShiftPettern::where('user_id',$username->user('user')->id)->get();

        return view('user.shift_create')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'shift_petterns' =>  $shift_petterns,
        ]);
    }

    public function create(Request $request)
    {
        // return $request;
        return "登録しました";
    }

}
