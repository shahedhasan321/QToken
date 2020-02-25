<?php

namespace App\Http\Controllers;

use App\Client;
use App\Counter;
use App\Department;
use App\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function manualToken(){
        $department=Department::where('status','active')->get();
        $counter=Counter::where('status','active')->get();
        return view('Token.manualToken',["dept"=>$department,"counter"=>$counter]);
    }
    public function autoToken(){
        return view('Token.autoToken');
    }

    public function storeclient(Request $request){
        $validatedData = $request->validate([
            'client_name' => 'required|max:25|min:5',
            'mobile_number'=>'required|size:10',
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

            if($token->save()){
                $token->token_no="$token->id"."$token->dept_id"."$token->counter_no"."$token->client_id";
                $token->update();
              return redirect()->route("token.list");
            }
    }

    public function tokenList(){
        $token =Token::all()->sortByDesc('created_at');
        return view('Token.tokenList',["token_list"=>$token]);
    }

    public function currentList(){
        $token =Token::all()->where('status','pending')->sortByDesc('created_at');
        return view('Token.currentToken',["token_list"=>$token]);
    }


    public function tokenComplete(Request $request){
        $token=Token::find($request->id);
        $token->status='complete';
        if($token->update()){
            return redirect()->route('token.list')->with('message','Token Completed successfully');
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
}
