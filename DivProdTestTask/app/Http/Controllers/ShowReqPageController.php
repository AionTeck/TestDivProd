<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowReqPageController extends Controller
{
    public function show(){
        return view('showReq');
    }
}
