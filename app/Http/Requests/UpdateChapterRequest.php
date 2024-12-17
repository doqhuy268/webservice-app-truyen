<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChapterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ];
    }
}
