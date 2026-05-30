<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(auth()->check())
        {
            return redirect('/admin');
        }

        return view(
            'admin.auth.login'
        );
    }
    public function login(Request $request)
    {
        $credentials = [

            'email' => $request->email,

            'password' => $request->password
        ];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/admin');
        }

        return back()->with(
            'error',
            'Invalid credentials'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(
            '/admin/login'
        );
    }
}