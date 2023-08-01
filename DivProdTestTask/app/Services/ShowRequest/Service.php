<?php


namespace App\Services\ShowRequest;

use App\Mail\SendAnswerMail;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class Service
{
    public function send($id, $request)
    {
        $sendReq = SendRequest::find($id);

        $sendReq->comment = $request->validated('comment');
        // Выставляется автоматически, если написан ответ
        $sendReq->status = ('Resolved');

        $sendReq->save();

        // (колхозный) Процесс создания всех нужных переменных для ответа в письме
        $name = $sendReq['name'];
        $message = $sendReq['message'];
        $comment = $sendReq['comment'];

        // отправка письма на указанный пользователем при обращении email, с созданным нами ответом
        Mail::to($sendReq['email'])->send(new SendAnswerMail($sendReq, $name, $message, $comment));
    }
}
