<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Status;
use App\User;

class SettingController extends Controller
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

        $user = User::where('id',$username->user('user')->id)->first();

        // dd($user->line_notification);

        return view('user.setting')->with([
            'username' => $username->user('user'),
            'status' => $status,
            'is_image' => $is_image,
            'mail_end_of_month_notification' => $user->mail_notification,
            'line_end_of_month_notification' => $user->line_notification,
        ]);
    }

    public function edit(Request $request)
    {
        $user = Auth::id();

        User::where('id',$user)->update([
            'mail_notification' => $request->mail_end_of_month_notification,
            'line_notification' => $request->line_end_of_month_notification,
        ]);
        
        return back();
    }
}
