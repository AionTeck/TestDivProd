<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginStoreController extends BaseController
{
    public function __invoke(LoginStore $request)
    {
        $this->service->store($request);
        return redirect('/');
    }
}
