<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SuperVisor extends Model
{
    use Notifiable;

    protected $fillable = [
        'name','email','line_notification','mail_notification',
    ];

}
