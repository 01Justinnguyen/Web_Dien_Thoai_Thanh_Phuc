<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email'       =>  'required|email|unique:users,email',
            'password'    =>  'required|min:6|max:30',
            're_password' =>  'required|min:6|max:30|same:password',
            'name'    =>  'required|min:6|max:30',
        ];
    }
}
