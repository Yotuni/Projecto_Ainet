<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User;
        return view('users.add' , compact('user'));
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('edit' , compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->fill($request->except('password'));
        $user->save();
        return redirect()->route('profile')->with('success', 'User updated successfully!!');
    }

    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!!');
    }

/*    public function store(CreateUserPostRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'User added successfully!!');
    }*/

     public function store(Request $request)
     {
         $this->validate($request, [
             'name' => 'required|regex:/^[a-zA-Z ]+$/',
             'email' => 'required|unique:users|email',
             'type' => 'required|between:0,2',
             'password' => 'required|min:8|confirmed'
             ]);
         $user = new User();
         $user->fill($request->all());
         $user->password = Hash::make($request->password);
         $user->save();

         return redirect()->route('users.index')->with('success', 'User added successfully!!');
     }
}
