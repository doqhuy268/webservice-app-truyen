<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function getCommentsByStory($storyId, $filters)
    {
        return Comment::where('id_story', $storyId)
            ->with('user') // Load thông tin người dùng
            ->orderBy($filters['sort'] ?? 'created_at', $filters['order'] ?? 'desc')
            ->paginate($filters['limit'] ?? 10);
    }

    public function createComment(array $data)
    {
        return Comment::create($data);
    }

    public function updateComment($id, array $data)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($data);
        return $comment;
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }
}
