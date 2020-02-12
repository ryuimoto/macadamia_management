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

    public function changeDate()
    {
        return 1234;
    }

    public function index($year,$month)
    {
        $carbon = new Carbon($year,$month);

        $edit_year = new Carbon($year);

        if($month < 1)
        {
            return $edit_year->subYear()->year;
        } else if($month > 12 )
        {
            return $edit_year->addYear()->year;
        }

        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

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
            'month' => $month,
            'weekday' => $weekday,
            'shifts' => $shifts,
            'working_days' => $shifts->count(),
            'total' => $total,
        ]);
    }
}
