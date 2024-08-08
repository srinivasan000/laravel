<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::orderBy("id", "asc")->paginate(4);
        return view("employees.home", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "designation" => "required",
            "salary" => "required|numeric",
            'profile' => 'required|mimes:jpeg,png,jpg,gif|file',
        ]);
        $data = $request->all();
        if ($file = $request->file('profile')) {
            $name = $file->getClientOriginalName();
            $path = $file->move("uploads", $name);
            $data['profile'] = $path;
        }

        $employees = Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'New employee added successfully');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.details', compact("employee"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view("employees.edit", compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            "name" => "required",
            "designation" => "required",
            "salary" => "required|numeric",
            'profile' => 'required|mimes:jpeg,png,jpg,gif|file',
        ]);
        $data = $request->all();
        if ($file = $request->file('profile')) {
            $name = $file->getClientOriginalName();
            $path = $file->move("uploads", $name);
            $data['profile'] = $path;
        }
        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'employee deleted successfully');
    }
}
