<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user=new User();
        $user->name=$validate['name'];
        $user->email=$validate['email'];
        $user->password=bcrypt($validate['password']);
        $user->save();
        echo "create your account please check email address ";
        exit;
    }
}
