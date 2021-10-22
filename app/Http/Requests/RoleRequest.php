<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => 'required|max:20|min:2|unique:roles,name,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên vai trò bắt buộc phải nhập',
            'name.max' => 'Tên vai trò dài tối đa là 20 kí tự',
            'name.min' => 'Tên vai trò có độ tối thiểu là 2 kí tự',
            'name.unique' => 'Tên vai trò đã tồn tại',
        ];
    }
}
