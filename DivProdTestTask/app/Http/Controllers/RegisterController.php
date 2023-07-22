<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){

            $request->validate([
                'name' => 'required|min:2|max:150',
                'email' => 'required|email|min:5|max:200',
                'password' =>'required|min:8'
            ]);

            $user = User::create([
               'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request -> password)
            ]);

            Auth::login($user);

            return redirect('/');
    }
}
