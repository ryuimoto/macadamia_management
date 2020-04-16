<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LineNotificationPeggingController extends Controller
{
    public function index()
    {
        return view('admin.line_notification_pegging');
    }

    public function details()
    {
        return view('admin/line_notification_pegging_details');
    }
}
