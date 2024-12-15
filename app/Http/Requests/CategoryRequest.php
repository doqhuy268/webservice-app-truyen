<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép mọi yêu cầu được xác thực
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:category,name,' . ($this->category ?? 'null'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thể loại không được để trống',
            'name.unique' => 'Tên thể loại đã tồn tại',
            'name.max' => 'Tên thể loại không được vượt quá 100 ký tự',
        ];
    }
}
