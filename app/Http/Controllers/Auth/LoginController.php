<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // Login User
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Store User
        // Validate form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Authenticate user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        // Redirect user
        return redirect()->route('dashboard');
    }
}
