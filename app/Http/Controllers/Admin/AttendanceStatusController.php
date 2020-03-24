<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AttendanceStatusController extends Controller
{
    public function index()
    {
        return view('admin.attendance_status');
    }
}
