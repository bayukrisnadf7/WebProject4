<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
    public function index2()
    {
        return view('masuk.masuk');
    }
    public function index3()
    {
        return view('daftar.daftar');
    }
}
