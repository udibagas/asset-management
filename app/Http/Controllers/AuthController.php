<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\User;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate form
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // register session

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|in:M,F',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user =  User::create($validated);
        Auth::login($user); // login user after registered

        // send email
        // Mail::to($user)->send(new UserRegistered($user)); // synchronous
        // Mail::to($user)->queue(new UserRegistered($user)); // asynchronous, masuk ke queue
        $user->notify(new UserRegisteredNotification());

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Registration successful'], 201);
        }

        return redirect('/');
    }
}
