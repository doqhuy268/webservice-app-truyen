<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategories(array $filters = []): mixed;

    public function getCategoryById(int $id): mixed;

    public function createCategory(array $data): mixed;

    public function updateCategory(int $id, array $data): mixed;

    public function deleteCategory(int $id): bool;
}
