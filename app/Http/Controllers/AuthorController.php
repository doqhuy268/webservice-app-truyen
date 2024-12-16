<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index(Request $request)
    {
        $filters = $request->only('search');
        $paginate = $request->query('paginate', true);
        $perPage = $request->query('per_page', 10);

        $authors = $this->authorRepository->getAll($filters, $paginate, $perPage);

        return response()->json($authors);
    }

    public function show($id)
    {
        $author = $this->authorRepository->getById($id);
        return response()->json($author);
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->authorRepository->create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Author created successfully.',
            'data' => $author
        ], 201);
    }

    public function update(AuthorRequest $request, $id)
    {
        $author = $this->authorRepository->update($id, $request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully.',
            'data' => $author
        ]);
    }

    public function destroy($id)
    {
        $this->authorRepository->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully.'
        ]);
    }
}
