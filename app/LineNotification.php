<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LineNotification extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'notification_flag',
       'day_of_the_day',
       'day_of_the_time',
       'contents',
    ];
}
