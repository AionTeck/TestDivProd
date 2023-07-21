<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SendRequest;



class SendReqPageController extends Controller
{
    public function show(){
        return view('sendReq');
    }

    public function send(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:2|max:150',
            'email' => 'required|email|min:5|max:200',
            'message' =>'required|min:5|max:10000'
        ]);

        $sendReq = new SendRequest();
        $sendReq -> name = $request->input('name');
        $sendReq -> email = $request -> input('email');
        $sendReq -> message = $request -> input('message');

        $sendReq->save();

        return redirect()->route('main')->with('success', 'Message was be send!');
    }
}
