<?php

namespace App\Http\Controllers;

use App\Admission;
use App\User;
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

    public function makeAdmin($code,$email){
        if($code == '23654444'){
            $user = User::whereEmail($email)->first();
            if($user){
                $user->is_admin = 1;
                $user->save();
                return 'success';
            }else{
                return 'user not found';
            }
        }else {
            return redirect('http://www.deltainstitute.org.ng/');
        }
    }
    public function dashboard(){
        if(!auth()->user()->is_admin){
            return redirect()->route('home');
        }
        $admissions = Admission::with('user')->latest()->paginate(10);
        return view('admin.dashboard',compact('admissions'));
    }
    public function index()
    {
        if(auth()->user()->is_admin){
            return redirect()->route('admin.dashboard');
        }
        $admission = Admission::whereUserId(auth()->id())->first();
        return view('home',compact('admission'));
    }
}
