<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsLetterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|max:255|min:2|unique:news_letters,email,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email bắt buộc phải nhập.',
            'email.max' => 'Email dài tối đa là 255 kí tự.',
            'email.min' => 'Email có độ tối thiểu là 2 kí tự.',
            'email.unique' => 'Email đã tồn tại.',
        ];
    }
}
