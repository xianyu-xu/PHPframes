<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PremissionRequest extends FormRequest
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
            'pid'=>'required',
            'name'=>'required',
            'is_menu'=>'required'
        ];
    }

    public function messages()
    {
         return[
            'name.required'=>'权限名称不能为空',
            'pid.required'=>'父级菜单不能为空',
            'is_menu.required'=>'是否菜单不能为空',
         ];
    } 
}
