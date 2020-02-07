<?php

namespace App\Http\Controllers\Admin;


use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeptController extends Controller
{
    public function index(){
        $dept=Department::all();
        return view('admin.department.deptList',['dept_list'=>$dept]);
    }
    public function create(){
        return view('admin.department.deptAdd');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dept_name' => 'required|unique:departments,name|max:25|min:5',
            'status' => 'required',
        ]);
        $dept=new Department;
        $dept->name=$request->dept_name;
        $dept->description=$request->description;
        $dept->status=$request->status;
        if($dept->save()){
            return redirect()->back()->with('message','Product updated successfully');
        }
        return redirect()->back()->with('message','Error occurred');
    }

    public function edit(Request $request){
        $dept=Department::find($request->id);
        return view('admin.department.deptUpdate',['dept'=>$dept]);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'dept_name' => 'required|max:25|min:5',
            'status' => 'required',
        ]);
        $dept=Department::find($request->id);
        $dept->name=$request->dept_name;
        $dept->description=$request->description;
        $dept->status=$request->status;
        if($dept->update()){
            return redirect()->route('list.dept')->with('message','Product updated successfully');
        }
        return redirect()->route('list.dept')->with('message','Error occurred');
    }

    public function delete(Request $request){
        $dept=Department::find($request->id);
        if($dept->delete()){
            return redirect()->route('list.dept')->with('message','Department deleted successfully');
        }
        return redirect()-route('list.dept')->with('message','Error occurred');
    }
}
