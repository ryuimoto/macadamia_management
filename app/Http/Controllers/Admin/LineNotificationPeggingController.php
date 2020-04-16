<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\NotificationRequest;
use App\User;

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

    public function details($request_id)
    {
        $branch = NotificationRequest::where('id',$request_id)->first();

        if($branch->user_flag == true)
        {
            $persons = User::get();
        }else if($branch->supervisor_flag == true)
        {
            // $persons = 
        }

        

        return view('admin/line_notification_pegging_details')->with([
            'users' => $users,

        ]);
    }
}
