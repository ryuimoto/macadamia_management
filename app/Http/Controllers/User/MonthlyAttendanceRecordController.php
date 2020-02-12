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

    public function index($year,$month)
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        $carbon = new Carbon();

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        $shifts = Shift::where('user_id',$username->user('user')->id)
        ->whereMonth('date','=',$month)->whereDay('date','<',$carbon->day)
        ->orderBy('date')->get();     

        $total = 0;

        foreach($shifts as $shift)
        {
            $total += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        return view('user.monthly_attendance_record')->with([
            'username' =>  $username->user('user')->name,
            'status' => $status,
            'year' => $year,
            'weekday' => $weekday,
            'month' => $month,
            'shifts' => $shifts,
            'working_days' => $shifts->count(),
            'total' => $total,
        ]);
    }
}
