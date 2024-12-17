<?php

namespace App\Interfaces;

interface FavouriteRepositoryInterface
{
    public function getUserFavourites($userId, $filters);
    public function toggleFavourite($userId, $storyId);
}
