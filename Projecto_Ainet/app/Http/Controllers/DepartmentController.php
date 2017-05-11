<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    //Lista todos os departamentos
    public function index() {
        $departments = department::all();

        return view('departments.index', compact('departments'));
    }

    //Apresenta o form para criar novo departamento
    public function create() {
        return view('departments.create');
    }

    //Guarda novo departamento
    public function store() {
        $rules = array(
            'name' => 'required|unique:departments',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('departments/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $department = new department;
            $department->name = Input::get('name');
            $department->save();

            Session::flash('message', 'Department created!');
            return Redirect::to('departments');
        }
    }

    //Mostra determinado departamento
    public function show($id) {
        $department = department::find($id);

        return view('departments.show', compact('department'));
    }

    //Mostra form para editar determinada departamento
    public function edit($id) {
        $department = department::find($id);

        return view('departments.edit', compact('department'));
    }

    //Atualiza a informação de determinado departamento
    public function update($id) {
        $rules = array(
            'name' => 'required|unique:departments',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('departments/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $department = department::find($id);
            $department->name = Input::get('name');
            $department->save();

            Session::flash('message', 'Department updated!');
            return Redirect::to('departments');
        }
    }

    //Remove determinado departamento
    public function destroy($id) {
        $department = department::find($id);
        $department->delete();

        Session::flash('message', 'Department deleted!');
        return Redirect::to('departments');
    }
}
