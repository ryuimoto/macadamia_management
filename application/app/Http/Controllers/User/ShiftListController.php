<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Status;
use App\Shift;
use App\User;

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
        ->whereMonth('date','=',$carbon->month)->orderBy('date')->paginate(5);

        $weekday = ['日', '月', '火', '水', '木', '金', '土'];

        $is_image = false;
       
        if (Storage::disk('local')->exists('public/profile_images/' . $username->user('user')->image_name))
        {
            $is_image = true;
        }

        // $baton_passing_users = User::where('id','!=',$username->user('user')->id)->get();

        return view('user.shift_list')->with([
            'username' => $username->user('user'),
            'status' => $status,
            'shifts' => $shifts,
            'my_shifts' => $my_shifts,
            'weekday' => $weekday,
            'year' => $year,
            'month' => $month,
            'is_image' => $is_image,
            // 'baton_passing_users' => $baton_passing_users,
        ]);
    }

    public function put(Request $request)
    {
        if($request->date == $request->old_date){
            $request->validate([
                'attendance' => 'nullable|required|before:leaving',
                'leaving' => 'nullable|required',
            ]);
        }else{
            $request->validate([
                'date' => 'unique:shifts,date',
                'attendance' => 'nullable|required|before:leaving',
                'leaving' => 'nullable|required',
            ]);
        }
   
        if($request->delete)
        {
            return $this->delete($request);

        }else if($request->put or $request->user_id){
            Shift::where('id',$request->put)
            ->update([
                'date' => $request->date,
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
