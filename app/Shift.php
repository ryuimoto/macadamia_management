<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'user_id', 'attendance', 'leaving','date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
