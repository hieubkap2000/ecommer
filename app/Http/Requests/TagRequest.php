<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function rules()
    {
        return [
            'tag_name' => 'required|max:25|min:2|unique:tags,tag_name,' . $this->id,
            'slug'          => 'required|unique:tags,slug,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'tag_name.required' => 'Tag bắt buộc phải nhập',
            'tag_name.max' => 'Tag dài tối đa là 255 kí tự',
            'tag_name.min' => 'Tag có độ tối thiểu là 2 kí tự',
            'tag_name.unique' => 'Tag đã tồn tại',
            'slug.required' => 'Slug bắt buộc phải nhập',
            'slug.unique' => 'Slug đã tồn tại',
        ];
    }
}
