<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function IndexLogIn()
    {
        return view('home');
    }
    /*public function cms()
    {
        return view('/admin/cms');
    }*/
    public function Home()
    {
        return view('welcome');
    }
}
