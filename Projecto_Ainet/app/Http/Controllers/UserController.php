<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;



use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(7);

        return view('listUsers', compact('users'));
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

    public function profile()
    {
        return view('profile');
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        if ($request->hasFile('photo')) {
            //Retrieve photo from request
            $photo = $request->file('photo');
            //Make image
            $image = Image::make($photo)->resize(200, 300);
            //Image's name will be its name's hash
            $filename = $request->photo->hashName();
            $path = 'profiles';
            //Storing image
            Storage::disk('public')->put($path . '/' . $filename, $image->stream());
            //Get user
            $user = Auth::user();
            //Delete previous image
            Storage::disk('public')->delete($path . '/' . $user->profile_photo);
            //Stores the photo's hashname in DB
            $user->profile_photo = $filename;
        }
        $user->fill($request->except('password'));
        $user->save();
        return redirect()->route('profile')->with('success', 'User updated successfully!!');
    }

    public static function getProfilePhoto($filename = true){
        $path = "https://img.clipartfox.com/92c885a740b3c81c1cdf5e5e3752d86f_facebook-profile-picture-2017-facebook-profile-clipart_1290-1290.jpeg";
        return $path;
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
