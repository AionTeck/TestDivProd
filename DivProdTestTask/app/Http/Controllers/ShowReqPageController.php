<?php

namespace App\Http\Controllers;

use App\Mail\SendAnswerMail;
use Illuminate\Http\Request;
use App\Models\SendRequest;
use Illuminate\Support\Facades\Mail;

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
        $sendReq -> status = ('Resolved');

        $sendReq->save();


        $name = $sendReq['name'];
        $message = $sendReq['message'];
        $comment = $sendReq['comment'];
        Mail::to($sendReq['email'])->send(new SendAnswerMail($sendReq,$name,$message,$comment));
        return redirect()->route('main');
    }

    public function show_active(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->where('status', '=', 'Active')->get()]);
    }

    public function show_resolved(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->where('status', '=', 'Resolved')->get()]);
    }

    public function byDateNewest(){
        $showReq = new SendRequest;

        return view('showReq',
            ['data' => $showReq->orderBy('created_at', 'desc')->get()]);
    }


}
