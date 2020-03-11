<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Token;
use App\Counter;
use App\Department;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private $token;
    private $pending_token;
    private $counter;
    private $dept;
    private $user;

    public function widgets(){
        $this->token=Token::count();
        $this->pending_token=Token::where('status','pending')->count();
        $this->counter=Counter::count();
        $this->dept=Department::count();
        $this->user=User::count();
        return view('admin.home',['token'=>$this->token,'pending_token'=>$this->pending_token,'counter'=>$this->counter,'department'=>$this->dept,'user'=>$this->user,'title'=>'Dashboard']);
        }

    public function index()
    {
        $this->counter=Counter::all();
        $this->dept=Department::all();
        if(Auth::user()->role == 'admin'){
            $widgetsObj=new HomeController();
            return $widgetsObj->widgets();
        }

        elseif(Auth::user()->role == 'officer'){
            return view('officer.home',['title'=>'Home Page']);
        }

        elseif(Auth::user()->role == 'staff'){
            return view('staff.home',['counter'=>$this->counter,'department'=>$this->dept,'title'=>'Home Page']);
        }
    }

    /*public function officerIndex()
    {
        return view('officer.home');
    }

    public function staffIndex()
    {
        return view('staff.home');
    }*/


}
