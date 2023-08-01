<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $creditinals = $request->only(['email', 'password']);

        if (Auth::attempt($creditinals)) {
            return redirect('/');
        }

        return back()->withInput();
    }
}
