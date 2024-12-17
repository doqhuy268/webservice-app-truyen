<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Lấy thông tin chi tiết người dùng
    public function show($id)
    {
        $user = Auth::user();

        // Người dùng không phải admin chỉ được xem thông tin của chính họ
        if ($user->role !== 'admin' && $user->id != $id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $userData = $this->userRepository->getUserById($id);
        return response()->json($userData);
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        // Người dùng không phải admin chỉ được chỉnh sửa thông tin của chính họ
        if ($user->role !== 'admin' && $user->id != $id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6|confirmed',
            'image' => 'nullable|string',
        ]);

        $updatedUser = $this->userRepository->updateUser($id, $validatedData);
        return response()->json(['message' => 'User updated successfully', 'user' => $updatedUser]);
    }

    // Lấy danh sách người dùng (chỉ admin)
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return response()->json($users);
    }

    // Xóa người dùng (chỉ admin)
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}