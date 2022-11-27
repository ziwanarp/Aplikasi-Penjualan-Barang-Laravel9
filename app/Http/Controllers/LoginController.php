<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('index', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($credentials)) {

            // generate new last login berdasarkan auth id
            Auth::user()->last_login = new DateTime();
            User::where('id', Auth::user()->id)->update(['last_login' => Auth::user()->last_login]);

            return redirect()->intended('/dashboard')->with('loginSuccess', 'Login Berhasil !!');;
        }

        return back()->with('loginError', 'Email / Password salah !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
