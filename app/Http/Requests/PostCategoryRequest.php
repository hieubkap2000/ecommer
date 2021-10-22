<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_name' => 'required|max:255|min:2|unique:product_categories,category_name,' . $this->id,
            'sort_order'     => 'numeric|required',
            'slug'          => 'required|unique:product_categories,slug,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục bắt buộc phải nhập',
            'category_name.max' => 'Tên danh mục dài tối đa là 255 kí tự',
            'category_name.min' => 'Tên danh mục có độ tối thiểu là 2 kí tự',
            'category_name.unique' => 'Tên danh mục đã tồn tại',
            'sort_order.numeric' => 'Số thứ tự phải là số',
            'sort_order.required' => 'Số thứ tự bắt buộc phải nhập',
            'slug.required' => 'Slug bắt buộc phải nhập',
            'slug.unique' => 'Slug đã tồn tại',
        ];
    }
}
