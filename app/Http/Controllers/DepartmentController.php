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
        $department = new Department();

        $department->name = $request['name'];

        $department->save();

        return redirect('home');
    }
}
