<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    } 

    public function login()
    {
        return view('user.login');
    } 

    public function process(Request $req)
    {
        
        $validated=$req->validate([
            "email"=>['required', 'email'],
            "password"=>'required'
        ]);

        if(auth()->attempt($validated)){
            $req->session()->regenerate();
            return redirect("/");
        };
    } 

    public function store(Request $req)
    {
        $validated=$req->validate([
            "name"=>['required', 'min:4'],
            "email"=>['required', 'email', Rule::unique('users','email')],
            "password"=>'required|confirmed|min:6'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user=User::create($validated);
        return redirect("/");
    } 

    public function logout(Request $req){
        // @dd($req);
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/login');
    }

}
