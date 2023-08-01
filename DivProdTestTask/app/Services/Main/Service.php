<?php

namespace App\Services\Main;

use Illuminate\Support\Facades\Auth;

class Service
{
    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
