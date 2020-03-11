<?php

namespace App\Http\Controllers;

use App\Client;
use App\Counter;
use App\Department;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function manualToken(){
        $department=Department::where('status','active')->get();
        $counter=Counter::where('status','active')->get();
        if(Auth::user()->role=='admin')
            return view('admin.token.manualToken',["dept"=>$department,"counter"=>$counter,'title'=>'Create Token']);

    }

    public function autoToken(){
        return view('Token.autoToken');
    }

    public function storeclient(Request $request){
        $validatedData = $request->validate([
            'client_name' => 'required|max:25|min:5',
            'mobile_number'=>'required|size:11',
        ]);
        $client=new Client();
        $client->name=$request->client_name;
        $client->phone=$request->mobile_number;
        if($client->save()){
            return $client->id;
        }
    }

    public function storeToken(Request $request){
            $clientObject=new TokenController();
            $token=new Token();
            //Call client Table for Id
            $token->client_id=$clientObject->storeclient($request);

            $token->dept_id=$request->dept_id;

            $token->counter_no=$request->counter_id;

            $token->token_no='NULL';
            $token->status="pending";
            $token->token_no="$token->dept_id"."$token->counter_no"."$token->client_id";

            if($token->save()){
                return redirect()->back()->with('message','Token Added successfully');
            }
            return redirect()-back()->with('message','Error occurred');
    }

    public function tokenList(){
        $token =Token::all()->sortByDesc('created_at');

        if(Auth::user()->role=='admin')
            return view('admin.token.tokenList',["token_list"=>$token,'title'=>'Token List']);

        elseif(Auth::user()->role=='officer')
            return view('officer.tokenList',["token_list"=>$token,'title'=>'Token List']);
    }


    public function currentList(){
        $token =Token::all()->where('status','pending');

        if(Auth::user()->role=='admin')
            return view('admin.token.currentToken',["token_list"=>$token,'title'=>'Current List']);

        elseif(Auth::user()->role=='officer')
            return view('officer.currentToken',["token_list"=>$token,'title'=>'Current List']);

        elseif(Auth::user()->role=='staff')
            return view('staff.currentToken',["token_list"=>$token,'title'=>'Current List']);
    }


    public function tokenStatusUpdate(Request $request){
        $token=Token::find($request->id);
        $token->status=$request->status;
        if($token->update()){
            return redirect()->back()->with('message','Token Completed successfully');
        }
        return redirect()-back()->with('message','Error occurred');

    }


    public function tokenDelete(Request $request){
        $token=Token::find($request->id);
        if($token->delete()){
            return redirect()->back()->with('message','Token deleted successfully');
        }
        return redirect()-back()->with('message','Error occurred');
    }

    public function callToken(){
        $token=Token::where('status','pending')->first();
        return view('Officer.tokenProcess',["token"=>$token,'title'=>'Token Process']);
    }

}
