<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\PrintRequest;
use App\Printer;
use Auth;
use DB;

class RequestController extends Controller
{
    public function index(){
        $requests = PrintRequest::all();
        return view('requests.index', compact('requests'));
    }

    public function detail($request_id) {
        $pedido = PrintRequest::findOrFail($request_id);
        $owner_user = DB::table('users')->where('id', $pedido->owner_id)->first();
        return view('requests.detail', compact('pedido', 'owner_user'));
    }

    public static function getColoredStr($cor){
        switch($cor){
            case 0 :
                return "Monochromatic";
            case 1 :
                return "Colored";
            default: return null;
        }
    }

    public static function getSizeStr($tamanho){
        switch($tamanho){
            case 3 :
                return "A3";
            case 4 :
                return "A4";
            default: return null;
        }
    }

    public static function getTypeStr($tipo){
        switch($tipo){
            case 0 :
                return "Draft";
            case 1 :
                return "Normal";
            case 2 :
                return "Photograpic";
            default: return null;
        }
    }

    public function create(Request $request) {
        $pedido = new PrintRequest();
        $printers = Printer::all();
        $paper_sizes = [3 => 'A3', 4 => 'A4'];
        $color_types = [0 => 'Monochromatic', 1 => 'Colored'];
        $paper_types = [0 => 'Draft', 1 => 'Normal', 2 => 'Photograpic'];
        return view('requests.new', compact('pedido', 'printers', 'paper_sizes', 'color_types', 'paper_types'));
    }

    public function edit($request_id) {
        $pedido = PrintRequest::findOrFail($request_id);
        $printers = Printer::all();
        $paper_sizes = [3 => 'A3', 4 => 'A4'];
        $color_types = [0 => 'Monochromatic', 1 => 'Colored'];
        $paper_types = [0 => 'Draft', 1 => 'Normal', 2 => 'Photograpic'];
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
