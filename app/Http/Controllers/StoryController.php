<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Interfaces\StoryRepositoryInterface;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    private $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }

    public function index(Request $request)
    {
        $stories = $this->storyRepository->getAllStories($request->all());
        return response()->json(['status' => 'success', 'data' => $stories]);
    }

    public function show($id)
    {
        $story = $this->storyRepository->getStoryById($id);
        return response()->json(['status' => 'success', 'data' => $story]);
    }

    public function store(Request $request)
    {
        $story = $this->storyRepository->createStory($request->all());
        return response()->json(['status' => 'success', 'data' => $story], 201);
    }

    public function update(Request $request, $id)
    {
        $story = $this->storyRepository->updateStory($id, $request->all());
        return response()->json(['status' => 'success', 'data' => $story]);
    }

    public function destroy($id)
    {
        $this->storyRepository->deleteStory($id);
        return response()->json(['status' => 'success', 'message' => 'Story deleted successfully.']);
    }

    public function getTrending()
    {
        $stories = $this->storyRepository->getTrendingStories();
        return response()->json(['status' => 'success', 'data' => $stories]);
    }

    public function toggleLike($id)
    {
        $story = $this->storyRepository->toggleLike($id);
        return response()->json(['status' => 'success', 'data' => $story]);
    }
}
