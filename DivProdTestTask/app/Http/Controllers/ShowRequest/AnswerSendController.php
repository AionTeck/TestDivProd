<?php

namespace App\Http\Controllers\ShowRequest;

use App\Http\Controllers\Controller;
use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class AnswerSendController extends Controller
{
    public function __invoke($id, Request $request)
    {
// Заполнение значений сущностей comment и status

        $sendReq = SendRequest::find($id);

        $sendReq -> comment = $request -> input('comment');

        // Выставляется автоматически, если написан ответ
        $sendReq -> status = ('Resolved');

        $sendReq->save();

        // (колхозный) Процесс создания всех нужных переменных для ответа в письме
        $name = $sendReq['name'];
        $message = $sendReq['message'];
        $comment = $sendReq['comment'];

        // отправка письма на указанный пользователем при обращении email, с созданным нами ответом
        Mail::to($sendReq['email'])->send(new SendAnswerMail($sendReq,$name,$message,$comment));
        return redirect()->route('main');
    }
}
