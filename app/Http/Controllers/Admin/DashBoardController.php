<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\Shift;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::get();
        $today = new Carbon();

        $go_to_work_staffs = Shift::whereDate('date',$today)->get();

        return view('admin.dashboard')->with([
            'users' => $users->count(),
            'go_to_work_staffs' => $go_to_work_staffs,
            'scheduled_to_work_today' => $go_to_work_staffs->count(),
        ]);
    }
}
