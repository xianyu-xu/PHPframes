<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            //
            'usernaem'=>'required|between:2,6',
            'password'=>'required|confirmed',
            'password_confir,ation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'usernaem.required'=>'请输入用户名',
            'password.requeired'=>'请输入密码',
        ];
    }
}
