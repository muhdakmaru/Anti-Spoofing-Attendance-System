<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DB;

class adminController extends Controller
{
    function login (){
        return view ('admin');
    }

    function registerLecturer (Request $request)
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
        $data['phone_number'] = $request->phone_number;
        $data['department'] = $request->department;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if (!$user)
        {
            return redirect(route('registerLecturer'))->with('fail', 'Something went wrong');
        }
        return redirect(route('admin'))->with('success', 'You have successfully registered');

    }

    public function index()
    {
        return view ('lecturer');
    }

}
