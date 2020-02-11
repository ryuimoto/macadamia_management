<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;

use App\Status;
use App\Shift;

class MonthlyAttendanceRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        // dd($year);

        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        $carbon = new Carbon();

        $year = $carbon->year;

        $month = $carbon->month;

        $shifts = Shift::where('id',$username->user('user')->name)
        ->whereMonth('date','=',$carbon->month)->get();

        return view('user.monthly_attendance_record')->with([
            'username' =>  $username->user('user')->name,
            'status' => $status,
            'year' => $year,
            'month' => $month,
        ]);
    }
}
