<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    public function index(){
        return view('prosedur.index');
    }
}
