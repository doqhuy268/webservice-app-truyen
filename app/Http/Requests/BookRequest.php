<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:book,title,' . $this->route('id'),
            'content' => 'required|min:10',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:category,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề sách không được để trống',
            'title.max' => 'Tiêu đề sách không được vượt quá 255 ký tự',
            'title.unique' => 'Tiêu đề sách đã tồn tại',
            'content.required' => 'Nội dung sách không được để trống',
            'content.min' => 'Nội dung sách phải có ít nhất 10 ký tự',
            'categories.array' => 'Danh sách thể loại phải là một mảng',
            'categories.*.exists' => 'Thể loại không hợp lệ',
        ];
    }
}
