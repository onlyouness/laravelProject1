<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function createUser(Request $request)
    {
        $incomingFields = $request->validate([
            "username" => ["required", Rule::unique("users", "username")],
            "email" => "required",
            "password" => "required",
            "image" => "required"
        ]);
        if ($request->hasFile('image')) {
            $destination_path = "public/images/profiles";
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $incomingFields["image"] = $image_name;
        }
        $incomingFields["password"] = bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['username' => $incomingFields['username'], 'password' => $incomingFields["password"]])) {
            $request->session()->regenerate();
        }
        ;
        return redirect("/home");

    }
}
