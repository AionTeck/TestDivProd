<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SendRequest;

class ShowReqPageController extends Controller
{
    public function show(){

        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->all()]);
    }

    public function showMessage($id){

        $showReq = new SendRequest;

        return view('showOneReq',
        ['data'=>$showReq->find($id)]
        );
    }
}
