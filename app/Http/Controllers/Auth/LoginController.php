<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $validData = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validData)){
            $user = Auth::user();

            if($user->role == 'Student' || $user->role == 'Admin'){
                return redirect()->route('student.index');
            }
            elseif($user->role == 'Teacher'){
                return redirect()->route('teacher.index');
            }
        }
        return back()->with('alert', 'Invalid Credentials!');
    }
    public function logout(){

        $user = Auth::user();
        $user->logout;
        return redirect('/')->with('success', 'Logout Successfully!');
    }
}
