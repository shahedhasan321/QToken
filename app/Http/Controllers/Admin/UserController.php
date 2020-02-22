<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|min:5',
            'user_email' => 'required|string|email|max:255|unique:users,email',
            'user_mobile'=>'size:10',
            'user_password' => 'required|string|min:6',
            'user_role'=>'required',
        ]);
        $user=new User;
        $user->name=$request->user_name;
        $user->email=$request->user_email;
        $user->mobile=$request->user_mobile;
        $user->password=Hash::make($request->user_password);
        $user->role=$request->user_role;
        if($user->save()){
            return redirect()->back()->with('message','Product updated successfully');
        }
        return redirect()->back()->with('message','Error occurred');
    }
}
