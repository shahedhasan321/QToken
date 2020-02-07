<?php

namespace App\Http\Controllers\Admin;

use App\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){
        $counter=Counter::all();
        return view('admin.counter.counterList',['counter_list'=>$counter]);
    }

    public function create(){
        return view('admin.counter.counterAdd');
    }
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'counter_no' => 'required|unique:counters|size:4',
                'status' => 'required',
            ]);
            $counter=new Counter;
            $counter->counter_no=$request->counter_no;
            $counter->description=$request->description;
            $counter->status=$request->status;
            if($counter->save()){
                return redirect()->back()->with('message','Product updated successfully');
            }
            return redirect()->back()->with('message','Error occurred');
        }
    public function edit(Request $request){
        $counter=Counter::find($request->id);
        return view('admin.counter.counterEdit',['counter'=>$counter]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'counter_no' => 'required|size:4',
            'status' => 'required',
        ]);
        $counter = Counter::find($request->id);
        $counter->counter_no = $request->counter_no;
        $counter->description = $request->description;
        $counter->status = $request->status;
        if ($counter->update()) {
            return redirect()->route('counter.list')->with('message', 'Product updated successfully');
        }
        return redirect()->route('counter.list')->with('message', 'Error occurred');
    }
    public function delete(Request $request){
        $counter=Counter::find($request->id);
        if($counter->delete()){
            return redirect()->route('counter.list')->with('message','Department deleted successfully');
        }
        return redirect()-route('counter.list')->with('message','Error occurred');
    }
}
