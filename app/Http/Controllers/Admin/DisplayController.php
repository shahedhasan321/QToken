<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Token;

class DisplayController extends Controller
{
    //
    public function index(){
        $token=Token::where('status','pending')->paginate(8);
        return view('display',['tokens'=>$token]);
    }
}
