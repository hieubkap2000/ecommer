<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|max:255|min:2|unique:customers,email,' . $this->id,
            'username' => 'required|max:255|min:2|unique:customers,username,' . $this->id,
            'password' => 'required|min:6',
            'customer_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email bắt buộc phải nhập.',
            'email.max' => 'Email dài tối đa là 255 kí tự.',
            'email.min' => 'Email có độ tối thiểu là 2 kí tự.',
            'email.unique' => 'Email đã tồn tại.',

            'username.required' => 'Tên đăng nhập bắt buộc phải nhập.',
            'username.max' => 'Tên đăng nhập dài tối đa là 255 kí tự.',
            'username.min' => 'Tên đăng nhập có độ tối thiểu là 2 kí tự.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',

            'password.required' => 'Mật khẩu bắt buộc phải nhập.',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự.',

            'customer_name.required' => 'Tên người dùng bắt buộc phải nhập.'
        ];
    }
}
