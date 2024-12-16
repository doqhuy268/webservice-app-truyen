<?php

namespace App\Interfaces;

interface StoryRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getCategories($id);
    public function getChapters($id);
    public function getPopularStories();
}
