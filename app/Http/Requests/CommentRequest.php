<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => 'required|string|max:1000',
            'id_user' => 'exists:users,id', // Đảm bảo người dùng tồn tại
            'id_story' => 'exists:stories,id', // Đảm bảo truyện tồn tại
        ];
    }
}