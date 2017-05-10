<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrintRequest;

class RequestController extends Controller
{
    public function create(Request $request) {
        $pedido = new PrintRequest();
        return view('requests.new', compact('pedido'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'colored|required',
        ]);
        $pedido = new Printer();
        $pedido->fill($request->all());
        $pedido->save();

        return redirect()->route('profile')->with('success', 'Request added successfully!!');
    }

    public function index()
    {
        return view('home');
    }
}
