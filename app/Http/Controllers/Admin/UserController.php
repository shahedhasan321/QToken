<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $user=User::all();
        return view('admin.user.userList',['user_list'=>$user]);
    }
    public function create(){
        return view('admin.user.userAdd');
    }

    public function store(Request $request)
    {
        $user=new User;
        $user->name=$request->user_name;
        $user->email=$request->user_email;
        $user->mobile=$request->user_mobile;
        $user->password=$request->user_password;
        $user->role=$request->user_role;
        if($user->save()){
            return redirect()->back()->with('message','Product updated successfully');
        }
        return redirect()->back()->with('message','Error occurred');
    }
}
