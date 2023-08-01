<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class ActiveController extends Controller
{
    public function __invoke()
    {
        $showReq = SendRequest::WHERE('status', '=', 'Active');
        return view('showReq', ['data' => $showReq->get()]);
    }
}
