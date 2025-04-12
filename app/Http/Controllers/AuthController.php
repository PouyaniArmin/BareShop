<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();
        echo "create your account please check email address ";
        exit;
    }

    public function login()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $cerdentials = $request->only('email', 'password');
        if (Auth::attempt($cerdentials)) {
            echo "Login";
            exit;
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
