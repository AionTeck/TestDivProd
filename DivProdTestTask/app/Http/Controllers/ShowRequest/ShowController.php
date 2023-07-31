<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Models\SendRequest;

class ShowController extends Controller
{
    public function __invoke()
    {
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->all()]);
    }
}
