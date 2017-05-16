<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\PrintRequest;
use App\Printer;

class RequestController extends Controller
{
    public function create(Request $request) {
        $pedido = new PrintRequest();
        $printers = Printer::all();
        return view('requests.new', compact('pedido', 'printers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'colored' => 'required',
        ]);
        $file  = $request->file('print_file')->store('print_files');
        $pedido = new PrintRequest();
        $pedido->owner_id = 3;
        $pedido->status = 0;
        $pedido->fill($request->all());
        $pedido->file = $file;
        $pedido->save();

        return redirect()->route('profile')->with('success', 'Request added successfully!!');
    }

    public function index()
    {
        return view('home');
    }
}
