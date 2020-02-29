<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HashingController extends Controller
{
    public function postIndex(){
        $pass = \Illuminate\Support\Facades\Hash::make(request('password'));

        return $pass;
    }
}
