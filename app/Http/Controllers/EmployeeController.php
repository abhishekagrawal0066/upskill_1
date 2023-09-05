<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Companies;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return view('admin.employee.list',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Companies = Companies::all();
        return view('admin.employee.add',compact('Companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'employee_name' => 'required',
        ]);
        $empl = Employee::create($validatedData);
        return back()->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $id)
    {
        $employee = Employee::find($id);
        $companies = Companies::all();
        return view('admin.employee.edit')->with(compact('employee','companies'));
        // return $view->with(compact('myVar1', 'myVar2', ..... , 'myLastVar'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'employee_name' => 'required',
        ]);
        $id->update($validatedData);
        return redirect()->route('employee.list')->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $id)
    {
        $id->delete();
        return redirect()->route('employee.list')->with('success','Employee deleted successfully');
    }
}
