<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineNotification extends Model
{
    protected $fillable = [
        'user_id','notification_flag','contents', 'sending_period_day', 'sending_period_time',
    ];

}
