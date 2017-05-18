<?php

namespace App\Http\Controllers;

use App\PrintRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Model;

class WelcomeController extends Controller
{
    public function index()
    {
        $totalRequests = 0;
        return view('welcome', compact('totalRequests'));
    }

    public function profile($user_id = null)
    {
        $user = User::findOrFail($user_id);
        return view('profile', compact('user'));
    }

    public function listUsers()
    {
        $users = User::paginate(7);
        return view('listUsers', compact('users'));
    }
}
