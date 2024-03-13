<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signup.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'noMatch' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        User::loginUser($request);

        return redirect()->intended('/')->with('success', 'Successfully Logged In');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        User::logoutUser($request);

        return redirect('/')->with('success', 'Successfully Logged Out');
    }
}
