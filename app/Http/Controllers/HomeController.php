<?php

namespace App\Http\Controllers;
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
        return view('home',['token'=>$this->token,'pending_token'=>$this->pending_token,'counter'=>$this->counter,'department'=>$this->dept,'user'=>$this->user]);
        }

    public function index()
    {
        $widgetsObj=new HomeController();
        return $widgetsObj->widgets();
        //return view('home',['token'=>$this->token,'pending_token'=>$this->pending_token,'counter'=>$this->counter,'department'=>$this->dept,'user'=>$this->user]);
    }


}
