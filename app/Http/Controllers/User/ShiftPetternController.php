<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\ShiftPettern;
use App\Status;

class ShiftPetternController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        $patterns = ShiftPettern::where('user_id',$username->user('user')->id)->get();

        return view('user.shift_pettern')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'petterns' => $patterns,
        ]);
    }

    public function branchPost(Request $request)
    {
        $username = new LoggedInUser;

        $request->validate([
            'name' => 'required|max:15',
            'attendance' => 'nullable|required|before:leaving',
            'leaving' => 'nullable|required',
        ]);

        if(isset($request->put))
        {
            return $this->put($request);
        }else if(isset($request->delete))
        {
            return $this->delete($request);
        }else{
            ShiftPettern::Create([
                'user_id' => $username->user('user')->id,
                'name' => $request->name,
                'attendance' => $request->attendance,
                'leaving' => $request->leaving,
            ]);

            return back();
        }
    }

    public function put(Request $request)
    {

        ShiftPettern::where('id',$request->put)
        ->update([
            'name' => $request->name,
            'attendance' => $request->attendance,
            'leaving' => $request->leaving,
        ]);

        return back();
    }

    public function delete($request)
    {
        ShiftPettern::where('id', $request->delete)->delete();

        return back();
    }
}
