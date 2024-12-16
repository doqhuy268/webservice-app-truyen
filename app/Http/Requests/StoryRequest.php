<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'story_image' => 'nullable|string|max:255',
            'view_count' => 'nullable|integer|min:0',
            'like_count' => 'nullable|integer|min:0',
            'id_author' => 'nullable|exists:authors,id',
        ];
    }
}
