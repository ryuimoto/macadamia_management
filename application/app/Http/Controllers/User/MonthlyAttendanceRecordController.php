<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $is_image = false;

        if (Storage::disk('local')->exists('public/profile_images/' . $username->user('user')->image_name))
        {
            $is_image = true;
        }

        $change_date =  new Carbon($date);

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        $shifts = Shift::where('user_id',$username->user('user')->id)
        ->whereYear('date','=',$change_date->year)
        ->whereMonth('date','=',$change_date->month)
        ->where('date','<',$today)
        ->orderBy('date');

        $total = 0;

        foreach($shifts->get() as $shift)
        {
            $total += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        return view('user.monthly_attendance_record')->with([
            'username' =>  $username->user('user'),
            'status' => $status,
            'weekday' => $weekday,
            'date' => $change_date,
            'date_view' => $change_date,
            'working_days' => $shifts->count(),
            'shifts' => $shifts->paginate(10),
            'total' => $total,
            'is_image' => $is_image,
        ]);
    }
}
