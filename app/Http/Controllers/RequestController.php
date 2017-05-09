<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function create(Request $request) {
        $pedido = new Request();
        $pedido->save();

        return redirect('home');
    }

    public function index()
    {
        return view('home');
    }
}
