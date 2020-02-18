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

    public function index($date,$process)
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();
        $today = new Carbon();

        $change_date =  new Carbon($date);

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        $shifts = Shift::where('user_id',$username->user('user')->id) // モデル
        ->whereYear('date','=',$change_date->year)
        ->whereMonth('date','=',$change_date->month)
        ->where('date','<',$today)
        ->orderBy('date')->paginate(10);
    
        $total = 0;

        foreach($shifts as $shift)
        {
            $total += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        return view('user.monthly_attendance_record')->with([
            'username' =>  $username->user('user')->name,
            'status' => $status,
            'weekday' => $weekday,
            'date' => $change_date,
            'date_view' => $change_date,
            'shifts' => $shifts,
            'working_days' => $shifts->count(),
            'total' => $total,
        ]);
    }
}
