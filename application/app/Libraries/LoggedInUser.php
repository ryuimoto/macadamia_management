<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Auth;

class LoggedInUser
{
    /**
    * Invokes the common functions
    * 
    * @param string $data
    * @return boolean
    */

    public function user($user)
    {
        return $user = Auth::user();
    }
}
?>