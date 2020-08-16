<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\NotificationRequest;
use App\User;
use App\SuperVisor;

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
            $persons = SuperVisor::get();
        }

        return view('admin/line_notification_pegging_details')->with([
            'persons' => $persons,
            'line_data' => $branch,
            'request_id' => $request_id,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'line_displayname' => 'unique:users', 
            'line_user_id' => 'unique:users',
        ]);

        $notification_request = NotificationRequest::where('line_user_id',$request->line_user_id)->first();

        if($notification_request->user_flag == true)
        {
            User::where('id',$request->person)->update([
                'line_displayname' => $request->line_displayname,
                'line_user_id' => $request->line_user_id,
            ]);
    
        }else if($notification_request->supervisor_flag == true){
            SuperVisor::where('id',$request->person)->update([
                'line_displayname' => $request->line_displayname,
                'line_user_id' => $request->line_user_id,
            ]);
        }
       
        NotificationRequest::where('line_user_id',$request->line_user_id)->delete();

        return redirect()->route('admin.line_notification_pegging')->with([
            'pegging_done' => 'LINEアカウントを紐付けしました',
        ]);
    }
}
