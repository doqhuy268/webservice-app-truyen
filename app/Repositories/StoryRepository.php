<?php

namespace App\Repositories;

use App\Models\Story;
use App\Interfaces\StoryRepositoryInterface;

class StoryRepository implements StoryRepositoryInterface
{
    public function getAllStories($filters)
    {
        $query = Story::with(['categories', 'author']);

        if (!empty($filters['category'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                $q->where('id', $filters['category']);
            });
        }

        return $query
            ->orderBy($filters['sort'] ?? 'id', $filters['order'] ?? 'asc')
            ->paginate($filters['limit'] ?? 10);
    }

    public function getStoryById($id)
    {
        return Story::with(['categories', 'chapters', 'author'])->findOrFail($id);
    }

    public function createStory(array $data)
    {
        return Story::create($data);
    }

    public function updateStory($id, array $data)
    {
        $story = Story::findOrFail($id);
        $story->update($data);
        return $story;
    }

    public function deleteStory($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return true;
    }

    public function getTrendingStories()
    {
        return Story::orderBy('view_count', 'desc')->take(10)->get();
    }

    public function toggleLike($id)
    {
        $story = Story::findOrFail($id);
        $story->like_count += 1;
        $story->save();
        return $story;
    }
}