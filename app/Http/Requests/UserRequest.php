<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|max:255',
            'email'     => 'required|max:255|min:2|unique:users,email,' . $this->id,
            'avatar'    => 'required',
            'password'  => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng bắt buộc phải nhập',
            'name.max' => 'Tên người dùng dài tối đa là 255 kí tự',
            'email.required' => 'Email người dùng bắt buộc phải nhập',
            'email.max' => 'Email người dùng dài tối đa là 255 kí tự',
            'email.min' => 'Email người dùng có độ tối thiểu là 2 kí tự',
            'email.unique' => 'Email người dùng đã tồn tại',
            'avatar.required' => 'Hình đại diện bắt buộc phải có',
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.min' => 'Mật khẩu có độ tối thiểu là 8 kí tự'
        ];
    }
}
