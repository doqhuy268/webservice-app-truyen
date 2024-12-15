<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\BookRepositoryInterface;
use App\Http\Requests\BookRequest;
use App\Traits\ApiResponseTrait;

class BookController extends Controller
{
    use ApiResponseTrait;

    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only(['category', 'search', 'per_page']);
            $books = $this->bookRepository->getAllBooks($filters);
            return $this->successResponse($books, 'Danh sách sách');
        } catch (\Exception $e) {
            \Log::error('Error fetching books: ' . $e->getMessage());
            return $this->errorResponse('Lỗi truy xuất dữ liệu');
        }
    }

    public function store(BookRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $book = $this->bookRepository->createBook($validatedData);
            return $this->successResponse($book, 'Tạo sách thành công');
        } catch (\Exception $e) {
            \Log::error('Error creating book: ' . $e->getMessage());
            return $this->errorResponse('Lỗi khi tạo sách');
        }
    }

    public function show($id)
    {
        try {
            $book = $this->bookRepository->getBookById($id);
            return $this->successResponse($book, 'Chi tiết sách');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function update(BookRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();
            $book = $this->bookRepository->updateBook($id, $validatedData);
            return $this->successResponse($book, 'Cập nhật sách thành công');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->bookRepository->deleteBook($id);
            return $this->successResponse(null, 'Xóa sách thành công');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }
}
