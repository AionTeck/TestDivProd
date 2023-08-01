<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageLogoutController extends BaseController
{
    public function __invoke(Request $request)
    {
        $this->service->logout($request);
        return redirect('/');
    }
}
