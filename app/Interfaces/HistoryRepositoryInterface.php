<?php

namespace App\Interfaces;

interface HistoryRepositoryInterface
{
    public function getUserReadingHistory($userId, $params);
    public function trackChapter($userId, $storyId, $chapterId);
}
