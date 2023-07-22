<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function create(){
        return view('login');
    }


    public function store(Request $request){
        $creditinals = $request->only(['email', 'password']);

        if (Auth::attempt($creditinals)){
            return redirect('/');
        }

        return back()->withInput();
    }
}
