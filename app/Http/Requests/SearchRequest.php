<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'q' => 'required|string|max:255',
            'type' => [
                'nullable', 
                Rule::in(['story', 'author', 'category', 'all'])
            ],
            'page' => 'integer|min:1',
            'limit' => 'integer|between:1,100',
            'sort' => [
                'nullable', 
                Rule::in(['view_count', 'like_count', 'created_at'])
            ],
            'order' => [
                'nullable', 
                Rule::in(['asc', 'desc'])
            ]
        ];
    }

    public function getValidatedData(): array
    {
        return [
            'query' => $this->input('q'),
            'type' => $this->input('type', 'all'),
            'page' => $this->input('page', 1),
            'limit' => $this->input('limit', 20),
            'sort' => $this->input('sort', 'created_at'),
            'order' => $this->input('order', 'desc')
        ];
    }
}