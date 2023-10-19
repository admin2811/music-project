<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
       return view('auth.login');
    }
    
    public function loginAction(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'
        ])->validate();
        
        if (!Auth::attempt($request->only('name', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'name' => __('auth.failed')
            ]);
        }
        
        $request->session()->regenerate();
        
        return redirect()->route('dashboard');
        
    }
    public function register(){
        return view('auth.register');
    }
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
  
        return redirect()->route('login');
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
    public function profile()
    {
        return view('layouts.profile');
    }
}
