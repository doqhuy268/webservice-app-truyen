<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Đăng nhập và tạo token.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
    }

    /**
     * Đăng xuất và thu hồi token.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    /**
    * Đăng ký người dùng mới và tạo token.
    */
    public function register(Request $request)
    {
    // Validate dữ liệu đầu vào
    $request->validate([
        'username' => 'required|string|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'name' => 'required|string',
        'image' => 'nullable|string'
    ]);

    // Tạo user mới
    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => $request->password, // Sẽ tự hash trong model
        'name' => $request->name,
        'image' => $request->image ?? null,
        'role' => 'user', // Mặc định là user
    ]);

    // Tạo token cho user mới
    $token = $user->createToken('api-token')->plainTextToken;

    // Trả về response
    return response()->json([
        'message' => 'User registered successfully',
        'token' => $token,
        'user' => $user
    ], 201);
    }
}
