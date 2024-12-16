<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Các trường có thể gán tự động.
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'image',
        'role',
    ];

    /**
     * Các trường sẽ bị ẩn khi trả về JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * Kiểu dữ liệu cho các trường.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Quan hệ với bảng `favourites`.
     */
    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'id_user');
    }

    /**
     * Quan hệ với bảng `comments`.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_user');
    }

    /**
     * Quan hệ với bảng `histories`.
     */
    public function histories()
    {
        return $this->hasMany(History::class, 'id_user');
    }

    /**
     * Kiểm tra xem người dùng có phải admin không.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Kiểm tra quyền cụ thể.
     */
    public function hasPermission($permission)
    {
        // Có thể mở rộng logic kiểm tra quyền từ cơ sở dữ liệu.
        return $this->isAdmin(); // Mặc định chỉ admin có toàn quyền.
    }

    /**
     * Lấy URL của ảnh đại diện.
     */
    public function getImageUrlAttribute()
    {
        return $this->image 
            ? url('storage/' . $this->image) 
            : url('images/default-avatar.png');
    }
}
