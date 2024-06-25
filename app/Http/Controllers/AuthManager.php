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
            return redirect()->intended(route('viewLecturer'));
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
            'lecturer_id' => 'required',
            'phone_number' => 'required',
            'department' => 'required',
            'password' => 'required|min:2',

        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['lecturer_id'] = $request->lecturer_id;
        $data['phone_number'] = $request->required;
        $data['department'] = $request->department;
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


