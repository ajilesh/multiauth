<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Hash;
use Auth;

class StudentController extends Controller
{
    function login()
    {
        return view('student.login')->with('title','Student Login');
    }
    function Register()
    {
        return view('student.register')->with('title','Student Register');
    }
    function registerSave(REQUEST $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|max:20',
            'cpassword' => 'required|same:password'
        ],
        [
            'cpassword.same' => 'Password Not Match',
            'cpassword.equired' => 'Confirm Password Require',
        ]
    );

        $input = new Student();
        $input->email = $request->username;
        $input->password = Hash::make($request->password);
        $result = $input->save();
        if($result)
        {
            return redirect()->back()->with('success','Successfully Register');
        }
        else{

        }

    }
    //check
    function check(REQUEST $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:20'
        ],
    [
        'email.required' => 'Email Field Is Required',
        'email.email' => 'Enter The Correct Email'
    ]);
    //$input =
    //dd($request);
    $cred = $request->only('email','password');
    //dd($cred);
    if(Auth::guard('student')->attempt($cred))
    {

        //echo "success";
        return redirect()->route('student.dashboard');
    }
    else{
        return redirect()->back()->with('fail','Login Credential Error');
    }
 }
 function dashboard()
 {
     return view('student.dashboard');
 }
 function logout()
 {
     Auth::guard('student')->logout();
     return redirect()->route('student.login');
 }
}
