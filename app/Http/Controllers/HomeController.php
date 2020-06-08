<?php

namespace App\Http\Controllers;

use App\Admission;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admission = Admission::whereUserId(auth()->id())->first();
        return view('home',compact('admission'));
    }
}
