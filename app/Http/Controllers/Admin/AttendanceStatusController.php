<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Shift;
use App\User;
use App\AttendanceRecord;

class AttendanceStatusController extends Controller
{
    public function index($date)
    {
        $date = preg_replace('/[^0-9]/', '', $date.'01');

        $change_date = date('Y-m-1 H:i',strtotime($date));

        $carbon = new Carbon($change_date);

        $today = new Carbon();

        $users = User::get();

        $array = [];

        $working_days = [];

        foreach($users as $key => $user)
        {
            $result = 0;

            $shifts = Shift::where('user_id',$key+1)
            ->whereYear('date','=',$carbon->year)
            ->whereMonth('date','=',$carbon->month)
            ->where('date','<',$today)->get();

            $working_days[] = $shifts->count();

            foreach($shifts as $shift)
            {
                $result += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
            }

            $array[] = $result;
        }

        return view('admin.attendance_status')->with([
            'date' => $carbon,
            'users' => $users,
            'total_working_time' => $array,
            'working_days' => $working_days,
        ]);
    }
}
