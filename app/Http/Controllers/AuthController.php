<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Rules\ReCaptcha;

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
            'g-recaptcha-response' => [new ReCaptcha],
        ]);
        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();
        Auth::login($user);
        $user->sendEmailVerificationNotification();
        echo "create your account please check email address ";
        exit;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => Hash::make(Str::random(24)),
            ]
        );
        Auth::login($user);
        // return redirect()->to('/');
        echo "Login successful with Google";
        exit;
    }
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (strpos($request->email, 'google.com') !== false) {
            $request->validate([
                'email' => 'required|email',
            ]);

            $user = User::where('email', $request->email)->first();
            if ($user) {
                Auth::login($user);
                echo "Login successful with Google";
                exit;
            } else {
                return back()->withErrors(['email' => 'No user found with this email.']);
            }
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'g-recaptcha-response' => [new ReCaptcha]
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                echo "Login successful with regular credentials";
                exit;
            } else {
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
        }

    }
}
