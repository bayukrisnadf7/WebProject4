<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LupaPasswordController extends Controller
{
    public function index(){
        return view('lupa_password.index');
    }
}
