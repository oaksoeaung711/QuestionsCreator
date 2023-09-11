<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AdminLoginRequest $request){
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.home');
        }else{
            return back()->with('error','Invalid email or password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
