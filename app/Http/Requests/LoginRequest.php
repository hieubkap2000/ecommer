<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email bắt buộc phải nhập',
            'password.min' => 'Mật khẩu có độ tối thiểu là 8 kí tự',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
        ];
    }
}
