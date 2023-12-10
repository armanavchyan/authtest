<?php 
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    public function authrize()
    {
        return true;
    }
    public function rules()
    {
        $rules = [
            'name' => ['required', 'alpha'],
            'email' => ['required',  'email'],
            'password' => ['required', 'min:6']
        ];

        return $rules;
    }
}