<?php

namespace App\Repositories;

use App\Models\Story;
use App\Interfaces\StoryRepositoryInterface;

class StoryRepository implements StoryRepositoryInterface
{
    public function getAll()
    {
        return Story::with('author')->paginate(10);
    }

    public function getById($id)
    {
        return Story::with(['author', 'categories', 'chapters'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Story::create($data);
    }

    public function update($id, array $data)
    {
        $story = Story::findOrFail($id);
        $story->update($data);
        return $story;
    }

    public function delete($id)
    {
        $story = Story::findOrFail($id);
        return $story->delete();
    }

    public function getCategories($id)
    {
        return Story::findOrFail($id)->categories;
    }

    public function getChapters($id)
    {
        return Story::findOrFail($id)->chapters;
    }

    public function getPopularStories()
    {
        return Story::orderBy('view_count', 'desc')->take(10)->get();
    }
}
