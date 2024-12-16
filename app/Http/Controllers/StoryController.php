<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Interfaces\StoryRepositoryInterface;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    protected $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index()
    {
        return response()->json($this->storyRepository->getAll(), 200);
    }

    public function show($id)
    {
        return response()->json($this->storyRepository->getById($id), 200);
    }

    public function store(StoryRequest $request)
    {
        $story = $this->storyRepository->create($request->validated());
        return response()->json($story, 201);
    }

    public function update(StoryRequest $request, $id)
    {
        $story = $this->storyRepository->update($id, $request->validated());
        return response()->json($story, 200);
    }

    public function destroy($id)
    {
        $this->storyRepository->delete($id);
        return response()->json(['message' => 'Story deleted successfully'], 200);
    }

    public function getCategories($id)
    {
        return response()->json($this->storyRepository->getCategories($id), 200);
    }

    public function getChapters($id)
    {
        return response()->json($this->storyRepository->getChapters($id), 200);
    }

    public function getPopularStories()
    {
        return response()->json($this->storyRepository->getPopularStories(), 200);
    }
}
