<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Shift;

class AttendanceStatusController extends Controller
{
    public function index($date)
    {
        $date = preg_replace('/[^0-9]/', '', $date.'01');

        $change_date = date('Y-m-1 H:i',strtotime($date));

        $carbon = new Carbon($change_date);

        $works = Shift::whereYear('date',$carbon->year)
        ->whereMonth('date',$carbon->month);

        // dd($works->get());
        
        return view('admin.attendance_status')->with([
            'date' => $carbon,
            'works' => $works,
        ]);
    }
}
