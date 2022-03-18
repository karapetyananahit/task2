<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Auth as BasicAuth;

class Auth extends BasicAuth{

    static public function name() {
        return self::user()->name;
    }

}
