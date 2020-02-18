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

    
        foreach($shifts as $shift)
        {
            $working_hours += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        dd($working_hours);


        $go_to_work_staffs = Shift::whereDate('date',$today)->get();

        return view('user.dashboard')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'today' => $today,
            'weekday' => $weekday,
            'go_to_work_staffs' => $go_to_work_staffs,
        ]);
    }
}
