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

    public function answerMessage($id){
        $showReq = new SendRequest;

        return view('answerMessage',
            ['data'=>$showReq->find($id)]
        );
    }

    public function answerMessageSend($id, Request $request){

        $sendReq = SendRequest::find($id);

        $sendReq -> comment = $request -> input('comment');
        $sendReq -> status = $request -> input('status');

        $sendReq->save();
        return redirect()->route('main');
    }
}
