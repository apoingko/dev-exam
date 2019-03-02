<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->middle_name = $request->middle_name;
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital_status;
        $employee->position = $request->position;
        $employee->date_hired = $request->date_hired;
        // $employee->contact_info = empty($request->contact_info)?'' : $request->contact_info;
        // $employee->address_info = empty($request->address_info)?'' : $request->address_info;
        $employee->primary_contact = $request->primary_contact;
        $employee->primary_address = $request->primary_address;
        $employee->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('emp.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->role == 'admin'){
            $employee = Employee::find($id);
            return view('emp/edit',compact('employee'));
        }
        else{
            header('location:/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request,[
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->middle_name = $request->middle_name;
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital_status;
        $employee->position = $request->position;
        $employee->date_hired = $request->date_hired;
        $employee->primary_contact = $request->primary_contact;
        $employee->primary_address = $request->primary_address;
        $employee->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
    }
}
