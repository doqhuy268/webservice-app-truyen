<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $filters = $request->only('search');
        $paginate = $request->query('paginate', true);
        $perPage = $request->query('per_page', 10);

        $categories = $this->categoryRepository->getAll($filters, $paginate, $perPage);

        return response()->json($categories);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data' => $category
        ], 201);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->update($id, $request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully.',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.'
        ]);
    }
}
