<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks(array $filters = [])
    {
        $query = Book::with('categories');

        if (!empty($filters['category'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                if (is_numeric($filters['category'])) {
                    $q->where('id', $filters['category']);
                } else {
                    $q->where('name', $filters['category']);
                }
            });
        }

        if (!empty($filters['search'])) {
            $query->where('title', 'LIKE', '%' . $filters['search'] . '%');
        }

        $perPage = max(1, min($filters['per_page'] ?? 10, 100));
        return $query->paginate($perPage);
    }

    public function getBookById($id)
    {
        return Book::with('categories')->findOrFail($id);
    }

    public function createBook(array $data)
    {
        $book = Book::create($data);
        if (!empty($data['categories'])) {
            $book->categories()->sync($data['categories']);
        }
        return $book;
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        if (!empty($data['categories'])) {
            $book->categories()->sync($data['categories']);
        }
        return $book;
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}
