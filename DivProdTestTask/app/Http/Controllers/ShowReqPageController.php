<?php

namespace App\Http\Controllers;

use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

class ShowReqPageController extends Controller
{
    //Вывод всех записей из таблицы send_requests
    public function show(){

        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->all()]);
    }

    //Вывод выбранной записи из таблицы
    public function showMessage($id){

        $showReq = new SendRequest;

        return view('showOneReq',
            ['data'=>$showReq->find($id)]
        );
    }

    // Вывод записи из таблицы с полем для ответа
    public function answerMessage($id){
        $showReq = new SendRequest;

        return view('answerMessage',
            ['data'=>$showReq->find($id)]
        );
    }

    //Ответ на запрос пользователя
    public function answerMessageSend($id, Request $request){

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

    // Выборка (Да, не сортировка, как и все остальное) по статусу Active
    public function show_active(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->where('status', '=', 'Active')->get()]);
    }

    //Выборка по статусу Resolved
    public function show_resolved(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->where('status', '=', 'Resolved')->get()]);
    }

    //Выборка по дате создания, от новых к старым
    public function byDateNewest(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->orderBy('created_at', 'desc')->get()]);
    }


}
