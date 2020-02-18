<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;

use App\Status;
use App\Shift;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();
        $today = new Carbon();

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        $working_hours = 0;

        $shifts = Shift::where('user_id',$username->user('user')->id) // モデル
        ->whereYear('date','=',$today->year)
        ->whereMonth('date','=',$today->month)
        ->where('date','<',$today)
        ->orderBy('date')->get();

        $working_hours = 0;
    
        foreach($shifts as $shift)
        {
            $working_hours += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        $go_to_work_staffs = Shift::whereDate('date',$today)->get();

        for($i = 1; $i < 13; $i++)
        {
            $annual_attendance = Shift::where('user_id',$username->user('user')->id)
            ->whereMonth('date',$i)->get();

            $total[] = $annual_attendance->count();
        }

        return view('user.dashboard')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'today' => $today,
            'weekday' => $weekday,
            'go_to_work_staffs' => $go_to_work_staffs,
            'working_hours' => $working_hours,
            'working_days' => $shifts->count(),
            'annual_attendance' => $total,
        ]);
    }
}
