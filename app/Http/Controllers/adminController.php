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

    public function getLecturers()
    {
        $users = User::all();
        return view('lecturer', compact('users'));
    }

    public function editUserForm($id)
    {
        $user = User::find($id);
        return view('editLecturer', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lecturer_id = $request->input('lecturer_id');
        $user->phone_number = $request->input('phone_number');
        $user->department = $request->input('department');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/lecturer')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/lecturer')->with('success', 'User deleted successfully');
    }

}
