<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;

class PrinterController extends Controller
{
    public function index()
    {
        return view('printers.new');
    }

    public function create(Request $request) {
        $printer = new Printer;
        return view('printers.new' , compact('printer'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
        ]);
        $printer = new Printer();
        $printer->fill($request->all());
        $printer->save();

        return redirect()->route('profile')->with('success', 'User added successfully!!');
    }
}
