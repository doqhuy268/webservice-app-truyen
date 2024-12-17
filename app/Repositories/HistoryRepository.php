<?php

namespace App\Repositories;

use App\Models\History;
use App\Interfaces\HistoryRepositoryInterface;

class HistoryRepository implements HistoryRepositoryInterface
{
    public function getUserReadingHistory($userId, $params)
    {
        $query = History::with(['story', 'chapter'])
            ->where('id_user', $userId);

        // Pagination and Filtering
        if (isset($params['sort']) && isset($params['order'])) {
            $query->orderBy($params['sort'], $params['order']);
        }

        $limit = $params['limit'] ?? 10;

        return $query->paginate($limit);
    }

    public function trackChapter($userId, $storyId, $chapterId)
    {
        return History::updateOrCreate(
            [
                'id_user' => $userId,
                'id_story' => $storyId,
                'id_chapter' => $chapterId,
            ],
            ['updated_at' => now()]
        );
    }
}
