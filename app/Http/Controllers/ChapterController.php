<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Interfaces\ChapterRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChapterController extends Controller
{
    protected $chapterRepository;

    public function __construct(ChapterRepositoryInterface $chapterRepository)
    {
        $this->chapterRepository = $chapterRepository;
    }

    public function index($storyId): JsonResponse
    {
    $chapters = $this->chapterRepository->paginateChapters($storyId);
    return response()->json([
        'status' => 'success',
        'data' => $chapters->items(),
        'meta' => [
            'total' => $chapters->total(),
            'page' => $chapters->currentPage(),
            'limit' => $chapters->perPage(),
        ],
    ], 200);
    }


    // GET /api/chapters/{id}
    public function show($id): JsonResponse
    {
        $chapter = $this->chapterRepository->getChapterById($id);
        return response()->json(['status' => 'success', 'data' => $chapter], 200);
    }

    // POST /api/stories/{storyId}/chapters
    public function store($storyId, StoreChapterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['id_story'] = $storyId;
        $chapter = $this->chapterRepository->createChapter($data);

        return response()->json(['status' => 'success', 'data' => $chapter], 201);
    }

    // PUT /api/chapters/{id}
    public function update($id, UpdateChapterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $chapter = $this->chapterRepository->updateChapter($id, $data);

        return response()->json(['status' => 'success', 'data' => $chapter], 200);
    }

    // DELETE /api/chapters/{id}
    public function destroy($id): JsonResponse
    {
        $this->chapterRepository->deleteChapter($id);
        return response()->json(['status' => 'success', 'message' => 'Chapter deleted successfully'], 200);
    }
}