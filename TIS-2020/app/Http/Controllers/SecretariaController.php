<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SecretariaController extends Controller
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
        return view('secretariaHome'); //return view('home');
    }
    public function indexasistencia()
    {
        return view('auth/reporteAuxAsistencia'); //return view('home');
    }
    public function indexDpaUti()
    {
        return view('auth/reporteAuxDpaUti'); //return view('home');
    }
    public function indexresumen()
    {
        return view('auth/reporteAuxResumen'); //return view('home');
    }
}
