<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories(array $filters = []): mixed
    {
        $query = Category::query();

        // Bộ lọc tìm kiếm theo tên
        if (!empty($filters['search'])) {
            $query->where('name', 'LIKE', '%' . $filters['search'] . '%');
        }

        // Phân trang
        $perPage = max(1, min($filters['per_page'] ?? 10, 100));
        return $query->paginate($perPage);
    }

    public function getCategoryById(int $id): mixed
    {
        return Category::with('books')->findOrFail($id);
    }

    public function createCategory(array $data): mixed
    {
        return Category::create($data);
    }

    public function updateCategory(int $id, array $data): mixed
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function deleteCategory(int $id): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
