<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Loginrequest extends FormRequest
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
            'email'=>'required|max:255|email',
            'password'=>'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'không được để trống',
            'email.max'=>'không được vượt quá 255 ký tự',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'không được để trống',
            'password.min'=>'Mật khẩu  tối thiểu 6 ký tự',

        ];
    }
}
