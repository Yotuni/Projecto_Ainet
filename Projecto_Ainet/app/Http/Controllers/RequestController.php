<?php

namespace App\Http\Controllers;

use App\Department;
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
        $title = null;
        $requests = PrintRequest::all();
        return view('requests.index', compact('requests', 'title'));
    }

    public function userRequests(){
        $requests = DB::table('requests')->where('owner_id', Auth::user()->id)->get();
        $title = Auth::user()->name . " Requests";
        return view ('requests.index', compact('requests', 'title'));
    }

    public function detail($request_id) {
        $pedido = PrintRequest::findOrFail($request_id);
        $owner_user = DB::table('users')->where('id', $pedido->owner_id)->first();
        return view('requests.detail', compact('pedido', 'owner_user'));
    }

    public static function getPrinterName($printer_id){
        $printer_name = DB::table('printers')->where('id', $printer_id)->value('name');
        return $printer_name;
    }

    public function searchRequests($pedidos = null){
        if($pedidos == null){
            $pedidos = PrintRequest::all();
        }
        $departments = Department::all();
        return view('requests.search', compact('pedidos' , 'departments'));
    }

    public static function getOwnerName($user_id){
        return DB::table('users')->where('id', $user_id)->value('name');
    }

    public function refineSearch(Request $request){
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'expression' => 'nullable|string',
            'due_date' => 'nullable|date',
            'department_id' => 'numeric',
            'paper_type' => 'numeric|between:-1,2',
            'status' => 'numeric|between:-1,1',
        ]);
        $pedidos = null;
        if($request->name) {
            $owner_id = DB::table('users')->where('name',$request->name)->value('id');
            $pedidos = DB::table('requests')->where('owner_id', $owner_id)->get();
        }
        /*if($request->department_id) {
            if($pedidos != null) {
                $pedidos_ids = array_intersect($pedidos_ids, DB::table('requests')->join('users', 'requests.owner_id', '=' , 'users.id')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->where('departments.id', $request->department_id)->value('id'));
            } else {
                $pedidos_ids = DB::table('requests')->join('users', 'requests.owner_id', '=' , 'users.id')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->where('departments.id', $request->department_id)->value('id');
            }
        }
        if($request->due_date) {
            if($pedidos != null) {
                $pedidos = array_intersect($pedidos, DB::table('requests')->where('due_date', $request->due_date)->get());
            } else {
                $pedidos = DB::table('requests')->where('due_date', $request->due_date)->get();
            }
        }
        if($request->paper_type) {
            $pedidos = DB::table('requests')->where('paper_type', $request->paper_type)->get();
        }
        if($request->status) {
            $pedidos = DB::table('requests')->where('status', $request->status)->get();
        }*/
        if($request->expression) {
            if($pedidos != null) {
                $pedidos = array_intersect($pedidos, DB::table('requests')->where('description', 'like',  "%".$request->expression."%")->get());
            } else {
                $pedidos_ids = DB::table('requests')->where('description', 'like',  "%".$request->expression."%")->value('id');
            }
        }


        $departments = Department::all();
        return view('requests.search', compact('pedidos', 'departments'));
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
            'paper_size' => 'required|numeric|between:3,4',
            'paper_type' => 'required|numeric|between:0,2',
            'print_file' => 'required|file|mimes:jpg,jpeg,png,bmp,svg,odt,pdf,xls,xlt,xlsx,xlsm,doc,docx,docm',
            'printer_id' => 'required|numeric',
            'colored' => 'required|numeric|between:0,1',
        ]);
        $file  = $request->file('print_file')->store('print_files');
        $pedido = new PrintRequest();
        $pedido->owner_id = Auth::user()->id;
        $pedido->status = 0;
        $pedido->fill($request->all());
        $pedido->file = $file;
        $pedido->save();

        return redirect()->route('detail', $pedido->id)->with('success', 'Request added successfully!!');
    }
}
