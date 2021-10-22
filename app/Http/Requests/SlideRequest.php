<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    public function rules()
    {
        return [
            'slide_name'    => 'required|max:255|min:2|unique:slides,slide_name,' . $this->id,
            'image'         => 'required',
            'sort_order'    => 'numeric|required',
        ];
    }

    public function messages()
    {
        return [
            'slide_name.required' => 'Tên slide bắt buộc phải nhập',
            'slide_name.max' => 'Tên slide dài tối đa là 255 kí tự',
            'slide_name.min' => 'Tên slide có độ tối thiểu là 2 kí tự',
            'slide_name.unique' => 'Tên slide đã tồn tại',
            'image.required' => 'Hình ảnh bắt buộc phải có',
            'sort_order.numeric' => 'Số thứ tự phải là số',
            'sort_order.required' => 'Số thứ tự bắt buộc phải nhập',
        ];
    }
}
