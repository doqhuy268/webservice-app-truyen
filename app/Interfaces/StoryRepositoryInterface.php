<?php

namespace App\Interfaces;

interface StoryRepositoryInterface
{
    public function getAllStories($filters);
    public function getStoryById($id);
    public function createStory(array $data);
    public function updateStory($id, array $data);
    public function deleteStory($id);
    public function getTrendingStories();
    public function toggleLike($id);
}
