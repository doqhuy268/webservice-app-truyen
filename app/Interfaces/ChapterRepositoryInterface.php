<?php

namespace App\Interfaces;

interface ChapterRepositoryInterface
{
    public function getChapterById($id);
    public function createChapter($data);
    public function updateChapter($id, $data);
    public function deleteChapter($id);
}