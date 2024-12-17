<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserReadingHistoryRequest;
use App\Http\Requests\TrackChapterRequest;
use App\Interfaces\HistoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    protected $historyRepository;

    public function __construct(HistoryRepositoryInterface $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function getReadingHistory(GetUserReadingHistoryRequest $request)
    {
        $userId = Auth::id();
        $histories = $this->historyRepository->getUserReadingHistory($userId, $request->all());

        return response()->json([
            'status' => 'success',
            'data' => $histories->items(),
            'meta' => [
                'total' => $histories->total(),
                'page' => $histories->currentPage(),
                'limit' => $histories->perPage(),
            ],
        ]);
    }

    public function trackChapter(TrackChapterRequest $request, $storyId, $chapterId)
    {
        $userId = Auth::id();
        $this->historyRepository->trackChapter($userId, $storyId, $chapterId);

        return response()->json([
            'status' => 'success',
            'message' => 'Chapter tracked successfully.',
        ]);
    }
}
