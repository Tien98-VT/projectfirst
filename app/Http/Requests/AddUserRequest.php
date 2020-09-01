<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
           'email' => 'required|email|max:255|unique:users',
           'phone' => 'required|max:10|unique:users',
           'password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Không được vượt quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.max' => 'Số điện thoại không quá 10 ký tự',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự',
        ];
    }
}
