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
            $notification=array(
                'message'=>'Department added successfully',
                'alert_type' =>'success'
            );
            return redirect()->back()->with($notification);

        }else{
            $notification=array(
                'message'=>'Failed to Add Department',
                'alert_type' =>'danger'
            );
            return redirect()->back()->with($notification);
        }

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
            $notification=array(
                'message'=>'Update department successfully',
                'alert_type' =>'info'
            );
            return redirect()->route('list.dept')->with($notification);
        }else{
            $notification=array(
                'message'=>'Failed to update Department',
                'alert_type' =>'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function delete(Request $request){
        $dept=Department::find($request->id);
        if($dept->delete()){
            $notification=array(
                'message'=>' Department Deleted successfully',
                'alert_type' =>'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Failed to delete Department',
                'alert_type' =>'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
}
