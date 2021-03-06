<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Shift;
use App\Status;
use App\User;
use App\AttendanceRecord;

class EasyRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();
        $is_image = false;
        
        if (Storage::disk('local')->exists('public/profile_images/' . $username->user('user')->image_name))
        {
            $is_image = true;
        }

        return view('user.easy_registration')->with([
            'username' => $username->user('user'),
            'status' => $status,
            'is_image' => $is_image,
        ]);
    }

    public function registration(Request $request)
    {
        if(isset($request->edit))
        {
            return $this->edit($request);

        }else if(isset($request->delete))
        {
            return $this->delete($request);
        }else{
            $username = new LoggedInUser;

            $request->validate([
                'attendance' => 'nullable|required|before:leaving',
                'leaving' => 'nullable|required',
                'weekday' => 'nullable|required',
            ]);
    
            $weekday = array();
    
            foreach($request->weekday as $value) // 配列の値をint型に直す
            {
                $weekday[] = (int)$value;
            }
    
            $startOfMonth = now()->startOfMonth();
    
            $insertion_to_weekdays = collect(\Carbon\CarbonPeriod::create($startOfMonth->copy()->startOfMonth(), $startOfMonth->copy()->endOfMonth()))->filter(function (\Carbon\CarbonInterface $carbon) use ($weekday) {
                return in_array($carbon->dayOfWeek, $weekday, true);
            })->map(function (\Carbon\CarbonInterface $carbon) {
                return $carbon->toDateString();
            })->toArray();
    
            foreach($insertion_to_weekdays as $week)
            {
                try {
                    Shift::create([
                        'user_id' => $username->user('user')->id,
                        'attendance' => $request->attendance,
                        'leaving' => $request->leaving,
                        'date' => $week,
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

                    AttendanceRecord::updateOrInsert([
                        'user_id',$username->user('user')->status_id,
                        'total_working_time' => $working_hours,
                        'total_working_days' => $shifts->count(),
                    ]);
           
                } catch (\Illuminate\Database\QueryException $e) {
        
                    $errorCode = $e->errorInfo[1];
        
                    if($errorCode == 1062) //重複エラーをここでキャッチ
                    {
                      return back()->with(['duplication' => '登録済みの日付がありました。一括登録を利用する場合は一度シフトをすべて削除してください。']);
                    }
                }
            }
           
            return back();
        }
    }
}
