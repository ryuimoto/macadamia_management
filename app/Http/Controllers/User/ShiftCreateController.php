<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\LoggedInUser;

use App\Status;
use App\ShiftPettern;
use App\Shift;

class ShiftCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $username = new LoggedInUser;
        $status = Status::where('id',$username->user('user')->status_id)->first();

        $shift_petterns = ShiftPettern::where('user_id',$username->user('user')->id)->get();

        return view('user.shift_create')->with([
            'username' => $username->user('user')->name,
            'status' => $status,
            'shift_petterns' =>  $shift_petterns,
        ]);
    }

    public function create(Request $request)
    {
        $username = new LoggedInUser;
        $shift_petterns = ShiftPettern::where('id',$request->pettern)->first();

        Shift::create([
            'user_id' => $username->user('user')->id,
            'attendance' => $shift_petterns->attendance,
            'leaving' => $shift_petterns->leaving,
            'date' => $request->date,
        ]);

        // return $username->user('user')->id;
        return back();
    }

}
