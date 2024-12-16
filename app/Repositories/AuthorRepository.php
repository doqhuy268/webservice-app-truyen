<?php

namespace App\Repositories;

use App\Models\Author;
use App\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAll($filters = [], $paginate = false, $perPage = 10)
    {
        $query = Author::query();

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if ($paginate) {
            return $query->withCount('stories')->paginate($perPage);
        }

        return $query->withCount('stories')->get();
    }

    public function getById($id)
    {
        return Author::with('stories:id,title,story_image')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Author::create($data);
    }

    public function update($id, array $data)
    {
        $author = Author::findOrFail($id);
        $author->update($data);
        return $author;
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        return $author->delete();
    }
}
