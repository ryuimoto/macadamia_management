<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;

use App\Status;
use App\Shift;

class ShiftListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
       
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        $shifts = Shift::get();

        $carbon = new Carbon();
        $year = $carbon->year;
        $month = $carbon->month;
        $my_shifts = Shift::where('user_id',$username->user('user')->id)
        ->whereMonth('date','=',$carbon->month)->orderBy('date')->get();

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        return view('user.shift_list')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'shifts' => $shifts,
            'my_shifts' => $my_shifts,
            'weekday' => $weekday,
            'year' => $year,
            'month' => $month,
        ]);
    }

    public function put(Request $request)
    {
        if($request->delete)
        {
            return $this->delete($request);
        }else{

            Shift::where('id',$request->put)
            ->update([
                'attendance' => $request->attendance,
                'leaving' => $request->leaving,
            ]);
    
            return back();
        }
    }

    public function delete(Request $request)
    {
        Shift::where('id',$request->delete)->delete();

        return back();
    }
}
