<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class JefeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:usuario');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /////////////SECRETARIA//////////////
    public function index()
    {
        return view('jefeHome'); //return view('home');
    }
    public function indexasistencia()
    {
        return view('auth/reporteDocAsistencia'); //return view('home');
    }
    public function indexDpaUti()
    {
        return view('auth/reporteDocDpaUti'); //return view('home');
    }
    public function indexresumen()
    {
        return view('auth/reporteDocResumen'); //return view('home');
    }
}
