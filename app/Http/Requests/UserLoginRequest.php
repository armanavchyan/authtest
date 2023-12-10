<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserLoginRequest extends FormRequest
{
    public function authrize()
    {
        return true;
    }
    public function rules()
    {


        $rules = [
            'email' => ['required',  'email'],
            'password' => ['required', 'min:6']
        ];

        return $rules;
    }
}
