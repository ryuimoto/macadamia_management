<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SuperVisor;

class SuperVisorController extends Controller
{
    public function index()
    {
        $super_visors = SuperVisor::get();

        return view('admin.supervisor')->with([
            'super_visors' => $super_visors,
        ]);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        SuperVisor::create([
            'name' => $request->name,
            'email' => $request->email,
            'line_notification' => true,
            'mail_notification' => true,
        ]);

        return back();
    
    }

    public function details($id)
    {
        $super_visor = SuperVisor::where('id',$id)->first();
        
        return view('admin.supervisor_details')->with([
            'super_visor' => $super_visor,
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        return back();
    }

}
