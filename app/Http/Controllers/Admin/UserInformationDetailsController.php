<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserInformationDetailsController extends Controller
{
    public function index($user_id)
    {
        $user = User::where('id',$user_id)->first();

        return view('admin.user_info_details')->with([
            'user' => $user,
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
        ]);
    }
}
