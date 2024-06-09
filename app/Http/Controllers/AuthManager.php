<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        return view('login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login Details not Valid");
    }

    function registration()
    {
        return view('registration');
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if (!$user)
        {
            return redirect(route('registration'))->with('fail', 'Something went wrong');
        }
        return redirect(route('login'))->with('success', 'You have successfully registered');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}


