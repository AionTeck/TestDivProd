<?php

namespace App\Http\Requests\SendRequest;

use Illuminate\Foundation\Http\FormRequest;

class SendReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:150',
            'email' => 'required|email|min:5|max:200',
            'message' =>'required|min:5|max:10000'
        ];
    }
}
