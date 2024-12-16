<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Lấy thông tin chi tiết của một người dùng kèm theo các quan hệ.
     *
     * @param int $id
     * @return User|null
     */
    public function getUserById($id)
    {
        return User::with(['favourites', 'comments', 'histories'])->find($id);
    }

    /**
     * Tạo mới một người dùng.
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data)
    {
        // Hash password trước khi tạo user
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return User::create($data);
    }

    /**
     * Cập nhật thông tin người dùng.
     *
     * @param int $id
     * @param array $data
     * @return User
     * @throws ModelNotFoundException
     */
    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);

        // Hash password nếu được cung cấp trong dữ liệu
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return $user;
    }

    /**
     * Lấy danh sách tất cả người dùng.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return User::with(['favourites', 'comments', 'histories'])->get();
    }

    /**
     * Xóa người dùng bằng ID.
     *
     * @param int $id
     * @return bool|null
     * @throws ModelNotFoundException
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }

    /**
     * Tìm người dùng theo email.
     *
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
