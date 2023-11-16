<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    
    protected $redirectTo = '/admin';    
    
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index(){
        return view('auth.register');
    }
    
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }
    
    
    protected function create(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
        return User::create([
            
            'email' => $email,
            'password' => Hash::make($pass),
        ]);
    }
}

