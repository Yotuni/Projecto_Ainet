<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;

class PrinterController extends Controller
{
    public function create(Request $request) {
        $printer = new Printer();

        $printer->name = $request['name'];

        $printer->save();

        return redirect('home');
    }
    
    public function index()
    {
        return view('printers.new');
    }
}
