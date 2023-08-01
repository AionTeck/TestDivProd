<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageShowController extends Controller
{
    public function __invoke()
    {
        return view('main');
    }
}
