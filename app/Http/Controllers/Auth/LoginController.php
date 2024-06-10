<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user($credentials);
            
            switch ($user->role) {
                case 'finance':
                    return redirect()->route('finance.home');
                case 'manager':
                    return redirect()->route('manager.home');
                default:
                    return redirect()->route('officer.home');
            }
        }

        return redirect()->back()->withInput()->withErrors(['credentials' => 'The Email or Password is Incorrect']);
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}
