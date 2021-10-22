<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu bắt buộc phải nhập.',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự.',
        ];
    }
}
