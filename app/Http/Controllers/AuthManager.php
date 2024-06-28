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

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended(route('viewLecturer'));
        }
        else if ($email == "admin@admin" && $password == "admin")
        {
            return redirect()->intended(route('admin'));
        }
        else
        {
            return redirect(route('login'))->with("error", "Login Details not Valid");
        }



    }

    function registration()
    {
        return view('registration');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        }

        return redirect()->back()->with('error', 'Failed to update profile');
    }

}


