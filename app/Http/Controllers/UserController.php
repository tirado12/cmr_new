<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function index(){
        return view('admin.adminlogin');
    }
    public function store(Request $request) {

        // Validate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Log the user In
        $credentials = $request->only('email','password');

        if (! Auth::guard('admin')->Auth::attempt($credentials)) {
            return back()->withErrors([
                'message' => 'Wrong credentials please try again'
            ]);
        }

        // Session message
        session()->flash('msg','You have been logged in');

        return redirect('/admin');

    }

    
}
