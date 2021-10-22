<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'discount_code'    => 'required|max:50|min:2|unique:discounts,discount_code,' . $this->id,
            'discount_price'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'discount_code.required' => 'Mã giảm giá bắt buộc phải nhập',
            'discount_code.max' => 'Mã giảm giá dài tối đa là 50 kí tự',
            'discount_code.min' => 'Mã giảm giá có độ tối thiểu là 2 kí tự',
            'discount_code.unique' => 'Mã giảm giá đã tồn tại',
            'discount_price.required' => 'Giá giảm bắt buộc phải có',
        ];
    }
}
