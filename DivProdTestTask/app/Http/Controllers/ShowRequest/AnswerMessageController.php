<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class AnswerMessageController extends Controller
{
        public function __invoke($id)
        {
            $showReq = new SendRequest;
            return view('answerMessage',
                ['data'=>$showReq->find($id)]
            );
        }
}
