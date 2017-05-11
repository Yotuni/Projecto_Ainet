<?php

namespace App\Http\Controllers;

use App\Printer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PrinterController extends Controller
{
    //Lista todas as impressoras
    public function index() {
        $printers = Printer::all();

        return view('printers.index', compact('printers'));
    }

    //Apresenta o form para criar nova impressora
    public function create() {
        return view('printers.create');
    }

    //Guarda nova impressora
    public function store() {
        $rules = array(
            'name' => 'required|unique:printers',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('printers/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $printer = new printer;
            $printer->name = Input::get('name');
            $printer->save();

            Session::flash('message', 'Printer created!');
            return Redirect::to('printers');
        }
    }

    //Mostra determinada impressora
    public function show($id) {
        $printer = printer::find($id);

        return view('printers.show', compact('printer'));
    }

    //Mostra form para editar determinada impressora
    public function edit($id) {
        $printer = printer::find($id);

        return view('printers.edit', compact('printer'));
    }

    //Atualiza a informação de determinada impressora
    public function update($id) {
        $rules = array(
            'name' => 'required|unique:printers',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('printers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $printer = printer::find($id);
            $printer->name = Input::get('name');
            $printer->save();

            Session::flash('message', 'Printer updated!');
            return Redirect::to('printers');
        }
    }

    //Remove determinada impressora
    public function destroy($id) {
        $printer = printer::find($id);
        $printer->delete();

        Session::flash('message', 'Printer deleted!');
        return Redirect::to('printers');
    }
}
