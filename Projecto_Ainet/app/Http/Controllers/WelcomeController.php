<?php

namespace App\Http\Controllers;

use App\PrintRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Model;

class WelcomeController extends Controller
{
    public function index()
    {
        $totalRequests = 0;
        return view('welcome', compact('totalRequests'));
    }
}
