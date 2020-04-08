<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Status;
use App\ShiftPettern;
use App\Shift;
use App\User;

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

        $shifts = Shift::where('user_id',$username->user('user')->id)->get();
        $is_image = false;

        if (Storage::disk('local')->exists('public/profile_images/' . $username->user('user')->image_name))
        {
            $is_image = true;
        }

        // foreach($shifts as $shift)
        // {
        //     // dump($shift->attendance('G:i', strtotime($shift)));
        //     dump(date('g:i',strtotime($shift->attendance)));

        // }

        return view('user.shift_create')->with([
            'username' => $username->user('user'),
            'status' => $status,
            'shift_petterns' =>  $shift_petterns,
            'shifts' => $shifts,
            'is_image' => $is_image,
        ]);
    }

    public function create(Request $request)
    {
        $username = new LoggedInUser;
        $shift_petterns = ShiftPettern::where('id',$request->pettern)->first();

        Shift::create([
            'user_id' => $username->user('user')->id,
            'attendance' => $shift_petterns->attendance,
            'leaving' => $shift_petterns->leaving,
            'date' => $request->date,
        ]);

        $today = new Carbon;

        $shifts = Shift::where('user_id',$username->user('user')->id)
        ->whereYear('date','=',$today->year)
        ->whereMonth('date','=',$today->month)
        ->where('date','<',$today)
        ->orderBy('date')->get();

        $working_hours = 0;
                    
        foreach($shifts as $shift)
        {
            $working_hours += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
        }

        User::where('id',$username->user('user')->status_id)->update([
            'total_working_time' => $working_hours,
            'total_working_days' => $shifts->count(),
        ]);

    }

}
