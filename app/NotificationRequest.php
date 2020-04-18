<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NotificationRequest extends Model
{
    use Notifiable;

    protected $fillable = [
        'line_displayname',
        'line_user_id',
        'user_flag',
        'supervisor_flag',
    ];

}
