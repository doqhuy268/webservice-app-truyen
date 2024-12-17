<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetUserReadingHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page' => 'integer|min:1',
            'limit' => 'integer|min:1|max:100',
            'sort' => 'string|in:created_at,updated_at',
            'order' => 'string|in:asc,desc',
        ];
    }
}
