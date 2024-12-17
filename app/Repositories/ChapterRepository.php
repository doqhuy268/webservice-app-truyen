<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Interfaces\ChapterRepositoryInterface;

class ChapterRepository implements ChapterRepositoryInterface
{
    public function getChapterById($id)
    {
        return Chapter::findOrFail($id);
    }

    public function createChapter($data)
    {
        return Chapter::create($data);
    }

    public function updateChapter($id, $data)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->update($data);
        return $chapter;
    }

    public function deleteChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
        return $chapter->delete();
    }

    public function paginateChapters($storyId, $perPage = 10)
    {
    return Chapter::where('id_story', $storyId)->paginate($perPage);
    }
}