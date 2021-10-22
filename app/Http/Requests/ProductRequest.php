<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'product_name'      => 'required|max:255|min:2|unique:products,product_name,' . $this->id,
            'product_code'      => 'required|unique:products,product_code,' . $this->id,
            'category_id'       => 'required',
            'brand_id'          => 'required',
            'thumbnail'         => 'required',
            'images'            => 'required',
            'price'             => 'required|numeric',
            'quantity'          => 'required|numeric',
            'sort_order'        => 'required|numeric',
            'slug'              => 'required|min:2|unique:products,slug,' . $this->id,
            'status'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'product_name.max' => 'Tên sản phẩm dài tối đa là 255 kí tự',
            'product_name.min' => 'Tên sản phẩm có độ tối thiểu là 2 kí tự',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại',
            'product_code.required' => 'Mã sản phẩm bắt buộc phải nhập',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại',
            'category_id.required' => 'Danh mục bắt buộc phải chọn',
            'brand_id.required' => 'Thương hiệu bắt buộc phải chọn',
            'thumbnail.required' => 'Ảnh thumbnail bắt buộc phải có',
            'images.required' => 'Ảnh sản phẩm bắt buộc phải có',
            'price.required' => 'Giá sản phẩm bắt buộc phải nhập',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'quantity.required' => 'Số lượng sản phẩm bắt buộc phải nhập',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số',
            'sort_order.required' => 'Thứ tự sắp xếp bắt buộc phải nhập',
            'sort_order.numeric' => 'Thứ tự sắp xếp phải là số',
            'slug.required' => 'Slug bắt buộc phải có',
            'slug.min' => 'Slug có độ tối thiểu là 2 kí tự',
            'slug.unique' => 'Slug đã tồn tại',
            'status.required' => 'Trạng thái sản phẩm bắt buộc phải có',

        ];
    }
}
