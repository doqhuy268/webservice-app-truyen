<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CommentRepositoryInterface;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index($storyId, Request $request)
    {
        $comments = $this->commentRepository->getCommentsByStory($storyId, $request->all());
        return response()->json(['status' => 'success', 'data' => $comments]);
    }

    public function store($storyId, CommentRequest $request)
    {
        $data = $request->validated();
        $data['id_story'] = $storyId;
        $comment = $this->commentRepository->createComment($data);
        return response()->json(['status' => 'success', 'data' => $comment], 201);
    }

    public function update($id, CommentRequest $request)
    {
        $data = $request->validated();
        $comment = $this->commentRepository->updateComment($id, $data);
        return response()->json(['status' => 'success', 'data' => $comment]);
    }

    public function destroy($id)
    {
        $this->commentRepository->deleteComment($id);
        return response()->json(['status' => 'success', 'message' => 'Comment deleted successfully.']);
    }
}