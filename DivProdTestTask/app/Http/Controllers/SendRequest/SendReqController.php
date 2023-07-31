<?php

namespace App\Http\Controllers\SendRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendRequest\SendReq;
use Illuminate\Http\Request;
use App\Models\SendRequest;



class SendReqController extends BaseController
{
    public function __invoke(SendReq $request){
        // Валидация данных с помощью собстввнного реквеста,
        // если данные ее не проходят то выводятся ошибки что именно введено неверно
        $validatedData = $request->validated();
        //Создание и добавление валидных данных в БД
        $this->service->store($request);
        //роутинг на главную страницу полсе успешного выполнения отправки запроса
        return redirect()->route('main')->with('success', 'Message was be send!');
    }
}
