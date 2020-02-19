<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Status;

class AcountEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;

        $statuses = Status::get();
        $status = Status::where('id',$username->user('user')->status_id)->first();
        $is_image = false;
       
        if (Storage::disk('local')->exists('public/profile_images/' . $username->user('user')->image_name))
        {
            $is_image = true;
        }

        return view('user.acount_edit')->with([
            'username' => $username->user('user'),
            'name' => $username->user('user')->name,
            'status_ids' => $username->user('user')->status_id,
            'statuses' => $statuses,
            'status' => $status,
            'email' => $username->user('user')->email,
            'is_image' => $is_image,
        ]);
    }

    public function edit(Request $request)
    {

        $username = new LoggedInUser;

        $request->validate([
            'image_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'status_id' => 'required',
            'email' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        $edit_data = User::where('id',$username->user('user')->id);

        $edit_data->update([
            'name' => $request->name,
            'status_id' => $request->status_id,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
        ]);

        if($request->image_name)
        {
            $request->image_name->storeAs('public/profile_images',$request->file('image_name')->getClientOriginalName());

            $edit_data->update([
                'image_name' => $request->file('image_name')->getClientOriginalName(),
            ]);
        }

        return back()->with('success','アカウントを編集しました');

    }  
}
