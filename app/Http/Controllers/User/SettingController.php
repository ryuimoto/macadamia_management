<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Illuminate\Support\Facades\Storage;

use App\Status;

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

        return view('user.setting')->with([
            'username' => $username->user('user'),
            'status' => $status,
            'is_image' => $is_image,
        ]);
    }
}
