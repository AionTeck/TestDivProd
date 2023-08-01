<?php

namespace App\Services\SendRRequest;

use App\Models\SendRequest;

class Service
{
    public function store($request)
    {
        $sendReq = SendRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        $sendReq->save();
    }
}
