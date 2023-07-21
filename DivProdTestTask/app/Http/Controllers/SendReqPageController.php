<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendReqPageController extends Controller
{
    public function show(){
        return view('sendReq');
    }
}
