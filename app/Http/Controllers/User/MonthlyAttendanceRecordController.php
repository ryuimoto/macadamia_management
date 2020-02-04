<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\Status;

class MonthlyAttendanceRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        return view('user.monthly_attendance_record')->with([
            'username' =>  $username->user('user')->name,
            'status' => $status,
        ]);
    }
}
