<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\NotificationRequest;

class LineNotificationPeggingController extends Controller
{
    public function index()
    {
        $notification_users = NotificationRequest::where('user_flag',true)->get();

        $notification_supervisors = NotificationRequest::where('supervisor_flag',true)->get();
        
        return view('admin.line_notification_pegging')->with([
            'notification_users' => $notification_users,
            'notification_supervisors' => $notification_supervisors,
        ]);
    }

    public function details()
    {
        return view('admin/line_notification_pegging_details');
    }
}
