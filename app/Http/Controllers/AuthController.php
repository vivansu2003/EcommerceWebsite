<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function getlogin()
    {
        return view('login');
    }


    public function dologin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
    
        // Attempt to log in using either email or username
        $credentials = [
            'password' => $request->password,
            'status' => 1,
        ];
    
        // Check if the username is an email or not
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
        } else {
            $credentials['username'] = $request->username;
        }
    
        // Perform the login
        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home');
        } else {
            return redirect()->route('website.getlogin')->with('message', 'Login failed!');
        }
    }
    

    public function logout()
    {
        Auth::logout();


        return redirect()->route('site.home');
    }

    //đăng ký---------------------------------------------------------/////////////

    public function getRegister()
    {
        return view('register');
    }

    public function doRegister(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('site.home');
    }
}
