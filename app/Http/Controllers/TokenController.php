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
                $notification=array(
                    'message'=>'Token Created successfully',
                    'type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'message'=>'Failed to Create Token',
                    'type' =>'danger'
                );
            return redirect()->back()->with($notification);
            }
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
            return view('admin.token.currentToken',["token_list"=>$token,'title'=>'Current Token List']);

        elseif(Auth::user()->role=='officer')
            return view('officer.currentToken',["token_list"=>$token,'title'=>'Current Token List']);

        elseif(Auth::user()->role=='staff')
            return view('staff.currentToken',["token_list"=>$token,'title'=>'Current Token List']);
    }


    public function tokenStatusUpdate(Request $request){
        $token=Token::find($request->id);
        $token->status=$request->status;
        if($token->update()){
            $notification=array(
                'message'=>'Token Completed successfully',
                'type' =>'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Failed to Complete Token',
                'type' =>'danger'
            );
        return redirect()->back()->with($notification);
        }

    }


    public function tokenDelete(Request $request){
        $token=Token::find($request->id);
        if($token->delete()){
            $notification=array(
                'message'=>'Token Deleted successfully',
                'type' =>'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Failed to Delete Token',
                'type' =>'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function autoCall(){
        $token=Token::where('status','pending')->first();
        if($token==null)
            return redirect()->back()->with('message','There is no pending token');
        else
            return view('Officer.tokenProcess',["token"=>$token,'title'=>'Token Process']);
    }

    public function manualCall(Request $request){
        $token=Token::find($request->id);
            return view('Officer.tokenProcess',["token"=>$token,'title'=>'Token Process']);
    }

}
