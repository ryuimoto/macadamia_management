<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;

use App\Shift;

class EasyRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        return view('user.easy_registration')->with([
            'username' => $username->user('user')->name,
        ]);
    }

    public function registration(Request $request)
    {
        $username = new LoggedInUser;

        $dt = new Carbon();
        
        $startOfMonth = $dt->startOfMonth(); // 今月の初日

        $days = $dt->daysInMonth; // 今月の日数

        for ($i = 0 ; $i <= $days; $i++) 
        {
            // $dates[] = $startOfMonth->copy()->addDays($i)->dayOfWeekIso; // 1ヶ月の曜日
            $dates[] = $startOfMonth->copy()->addDays($i)->toArray(); // 1ヶ月の日にち
        }

        dd($dates);

      
        // $result = array_search(1, $dates['']);
        // return ($result);


        // バリデーション　一旦外す
        // $request->validate([
        //     'attendance' => 'nullable|required|before:leaving',
        //     'leaving' => 'nullable|required',
        //     'weekday' => 'nullable|required',
        // ]);

        // dd($request->weekday);

        // 1ヶ月の中の曜日を探し出して

        // Shift::create([
        //     'attendance' => ,
        //     'leaving' => ,
        //     'date' => ,
        // ]);        

    }
}
