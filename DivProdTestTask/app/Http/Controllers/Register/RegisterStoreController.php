<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registerr\RegisterStore;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterStoreController extends BaseController
{
    public function __invoke(RegisterStore $request)
    {
        //Использование созданного реквеста с валидацией
        $request->validated();
        //Использование функции Store в сервисе для передачи данных в БД
        $this->service->store($request);
        return redirect('/');
    }
}
