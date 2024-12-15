<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Traits\ApiResponseTrait;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->all();
            $categories = $this->categoryRepository->getAllCategories($filters);
            return $this->successResponse($categories, 'Danh sách thể loại');
        } catch (\Exception $e) {
            \Log::error('Error fetching categories: ' . $e->getMessage());
            return $this->errorResponse('Lỗi truy xuất dữ liệu');
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->categoryRepository->createCategory($request->validated());
            return $this->successResponse($category, 'Thêm thể loại thành công');
        } catch (\Exception $e) {
            \Log::error('Error creating category: ' . $e->getMessage());
            return $this->errorResponse('Lỗi khi thêm thể loại');
        }
    }

    public function show($id)
    {
        try {
            $category = $this->categoryRepository->getCategoryById($id);
            return $this->successResponse($category, 'Chi tiết thể loại');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->errorResponse('Thể loại không tồn tại', 404);
        } catch (\Exception $e) {
            \Log::error('Error fetching category: ' . $e->getMessage());
            return $this->errorResponse('Lỗi truy xuất dữ liệu');
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = $this->categoryRepository->updateCategory($id, $request->validated());
            return $this->successResponse($category, 'Cập nhật thể loại thành công');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->errorResponse('Thể loại không tồn tại', 404);
        } catch (\Exception $e) {
            \Log::error('Error updating category: ' . $e->getMessage());
            return $this->errorResponse('Lỗi khi cập nhật thể loại');
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryRepository->deleteCategory($id);
            return $this->successResponse(null, 'Xóa thể loại thành công');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->errorResponse('Thể loại không tồn tại', 404);
        } catch (\Exception $e) {
            \Log::error('Error deleting category: ' . $e->getMessage());
            return $this->errorResponse('Lỗi khi xóa thể loại');
        }
    }
}
