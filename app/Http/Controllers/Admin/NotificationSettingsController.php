<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationSettingsController extends Controller
{
    public function index()
    {
        return view('admin.notification_settings');
    }
}
