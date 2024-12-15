<?php

namespace App\Interfaces;

interface BookRepositoryInterface
{
    public function getAllBooks(array $filters);  // Lấy tất cả sách, hỗ trợ bộ lọc
    public function getBookById($id);             // Lấy sách theo ID
    public function createBook(array $data);      // Tạo sách mới
    public function updateBook($id, array $data); // Cập nhật sách
    public function deleteBook($id);              // Xóa sách
}
