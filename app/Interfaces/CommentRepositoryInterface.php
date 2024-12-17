<?php

namespace App\Interfaces;

interface CommentRepositoryInterface
{
    public function getCommentsByStory($storyId, $filters);
    public function createComment(array $data);
    public function updateComment($id, array $data);
    public function deleteComment($id);
}
