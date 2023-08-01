<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowRequest\AnswerSend;
use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class AnswerSendController extends BaseController
{
    public function __invoke($id, AnswerSend $request)
    {
// Заполнение значений сущностей comment и status

        $this->service->send($id, $request);
        return redirect()->route('main');
    }
}
