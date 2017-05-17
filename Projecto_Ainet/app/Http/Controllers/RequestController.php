<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\PrintRequest;
use App\Printer;
use Auth;

class RequestController extends Controller
{
    public function index(){
        $requests = PrintRequest::all();
        return view('requests.index', compact('requests'));
    }

    public function create(Request $request) {
        $pedido = new PrintRequest();
        $printers = Printer::all();
        $paper_sizes = [1 => 'A3', 2 => 'A4'];
        $color_types = [1 => 'Monochromatic', 2 => 'Colored'];
        $paper_types = [1 => 'Draft', 2 => 'Normal', 3 => 'Photograpic'];
        return view('requests.new', compact('pedido', 'printers', 'paper_sizes', 'color_types', 'paper_types'));
    }

    public function edit($request_id) {
        $pedido = PrintRequest::findOrFail($request_id);
        $printers = Printer::all();
        $paper_sizes = [1 => 'A3', 2 => 'A4'];
        $color_types = [1 => 'Monochromatic', 2 => 'Colored'];
        $paper_types = [1 => 'Draft', 2 => 'Normal', 3 => 'Photograpic'];
        return view('requests.new', compact('pedido', 'printers', 'paper_sizes', 'color_types', 'paper_types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|regex:/^[a-zA-Z0-9 ]*$/',
            'due_date' => 'nullable|date',
            'quantity' => 'required|numeric|between:1,1000',
            'paper_size' => 'required|numeric|between:1,2',
            'paper_type' => 'required|numeric|between:1,3',
            'print_file' => 'required|file|mimes:jpeg,png,bmp,svg,odt,pdf,xls,xlt,xlsx,xlsm,doc,docx,docm',
            'printer_id' => 'required|numeric',
            'colored' => 'required|numeric|between:1,2',
        ]);
        $file  = $request->file('print_file')->store('print_files');
        $pedido = new PrintRequest();
        $pedido->owner_id = Auth::user()->id;
        $pedido->status = 0;
        $pedido->fill($request->all());
        $pedido->file = $file;
        $pedido->save();

        return redirect()->route('profile')->with('success', 'Request added successfully!!');
    }
}
