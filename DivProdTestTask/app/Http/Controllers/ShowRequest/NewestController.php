<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class NewestController extends Controller
{
    public function __invoke()
    {
        $showReq = new SendRequest;
        return view('showReq',
            ['data' => $showReq->orderBy('created_at', 'desc')->get()]);
    }
}
