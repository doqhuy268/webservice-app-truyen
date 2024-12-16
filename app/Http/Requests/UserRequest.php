<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép gửi request này hay không.
     */
    public function authorize()
    {
        // Lấy ID người dùng từ route (nếu có)
        $userId = $this->route('id');

        // Logic kiểm tra quyền
        if ($this->isMethod('post')) {
            // Cho phép tạo user mới
            return auth()->check() && auth()->user()->role === 'admin';
        }

        // Chỉ admin hoặc chính người dùng được sửa thông tin
        return auth()->user()->id === (int) $userId || auth()->user()->role === 'admin';
    }

    /**
     * Định nghĩa các rules xác thực.
     */
    public function rules()
    {
        $rules = [];

        switch ($this->method()) {
            case 'POST':
                $rules = [
                    'username' => 'required|string|max:255|unique:users,username',
                    'email'    => 'required|email|max:255|unique:users,email',
                    'name'     => 'nullable|string|max:255',
                    'password' => 'required|string|min:8|confirmed',
                    'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'role'     => 'nullable|string|in:admin,member',
                ];
                break;

            case 'PUT':
            case 'PATCH':
                $userId = $this->route('id');
                $rules = [
                    'username' => [
                        'sometimes',
                        'string',
                        'max:255',
                        Rule::unique('users', 'username')->ignore($userId),
                    ],
                    'email' => [
                        'sometimes',
                        'email',
                        'max:255',
                        Rule::unique('users', 'email')->ignore($userId),
                    ],
                    'name'     => 'sometimes|string|max:255',
                    'password' => 'nullable|string|min:8|confirmed',
                    'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'role'     => [
                        'sometimes',
                        'string',
                        'in:admin,member',
                        Rule::prohibitedIf(auth()->user()->role !== 'admin'),
                    ],
                ];
                break;
        }

        return $rules;
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     */
    public function messages()
    {
        return [
            'username.required' => 'Username is required.',
            'username.unique'   => 'This username is already taken.',
            'email.required'    => 'Email is required.',
            'email.unique'      => 'This email is already registered.',
            'password.min'      => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'image.image'       => 'The uploaded file must be an image.',
            'image.mimes'       => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max'         => 'The image size must not exceed 2MB.',
            'role.in'           => 'Invalid role value. Accepted values are: admin, member.',
            'role.prohibited'   => 'Only admin can assign roles.',
        ];
    }
}
