<?php

namespace App\Services\Login;

use App\Models\SendRequest;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($request)
    {
        if (!Auth::attempt($creditinals = $request->validated())) {
            return back()->withInput();
        }
        return redirect('/');
    }
}
