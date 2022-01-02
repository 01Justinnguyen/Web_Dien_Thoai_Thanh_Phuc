<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password_old'      => 'required',
            'password'          => 'required',
            'password-confirm'  => 'required|same:password',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'password_old.required'         => 'Không đươc bỏ trống',
    //         'password.required'         => 'Không đươc bỏ trống',
    //         'password_confirm.required'         => 'Không đươc bỏ trống',
    //     ];
    // }

}
