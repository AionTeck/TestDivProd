<?php

namespace App\Http\Controllers\SendRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SendRequest;


class ShowSendController extends Controller
{
    public function __invoke()
    {
        return view('sendReq');
    }
}
