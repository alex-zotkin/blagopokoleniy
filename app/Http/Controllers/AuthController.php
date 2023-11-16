<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('web');
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

   

    public function getLogin(){
        if (Auth::check())
        {
            return redirect()->route('admin');
        }
        return view('auth.login');
        
    }

    public function postLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password], true)){
            return redirect()->route('admin');
        }
    }
}
