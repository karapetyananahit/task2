<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        dump(Auth::name());
        dump(Auth::id());
        dd(Auth::user()->toArray());
        echo  Auth::user()->name . ", you are Admin";
    }

}
