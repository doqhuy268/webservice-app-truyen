<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Constructor để áp dụng middleware bảo vệ route.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * [GET] /api/user/{id} - Hiển thị thông tin chi tiết của người dùng.
     */
    public function show($id)
    {
        $user = User::with(['favourites', 'comments', 'histories'])->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    /**
     * [PUT] /api/user/{id} - Cập nhật thông tin người dùng.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if (auth()->user()->id !== $user->id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user->update($request->validated());

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ], 200);
    }

    /**
     * [DELETE] /api/user/{id} - Xóa người dùng.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    /**
     * [GET] /api/users - Lấy danh sách tất cả người dùng (dành cho admin).
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $users = User::with(['favourites', 'comments', 'histories'])->get();

        return response()->json($users, 200);
    }
}
