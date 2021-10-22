<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brand_name' => 'required|max:255|min:2|unique:brands,brand_name,' . $this->id,
            'logo'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên thương hiệu bắt buộc phải nhập',
            'brand_name.max' => 'Tên thương hiệu dài tối đa là 255 kí tự',
            'brand_name.min' => 'Tên thương hiệu có độ tối thiểu là 2 kí tự',
            'brand_name.unique' => 'Tên thương hiệu đã tồn tại',
            'logo.required' => 'Logo bắt buộc phải có',
        ];
    }
}
