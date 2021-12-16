<?php

namespace App\Http\Requests\Admin\Auth;

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
            'email'      =>  'required|email|unique:admins,email',
            'fullname'   =>  'required|min:4|max:40',
            'password'   =>  'required|min:8|max:30',
            'repassword' =>  'required|same:password',
            'agree'      =>  'required|accepted',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
