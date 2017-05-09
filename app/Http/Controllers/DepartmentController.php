<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('departments.new');
    }

    public function create(Request $request) {
        $department = new Department;
        return view('departments.new' , compact('department'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
        ]);
        $department = new Department();
        $department->fill($request->all());
        $department->save();

        return redirect()->route('profile')->with('success', 'User added successfully!!');
    }
}
