<?php

namespace App\Repositories;

use App\Interfaces\FavouriteRepositoryInterface;
use App\Models\Favourite;

class FavouriteRepository implements FavouriteRepositoryInterface
{
    public function getUserFavourites($userId, $filters)
    {
        return Favourite::where('id_user', $userId)
            ->with('story') // Load thông tin truyện
            ->orderBy($filters['sort'] ?? 'created_at', $filters['order'] ?? 'desc')
            ->paginate($filters['limit'] ?? 10);
    }

    public function toggleFavourite($userId, $storyId)
    {
        $favourite = Favourite::where('id_user', $userId)->where('id_story', $storyId)->first();

        if ($favourite) {
            $favourite->delete();
            return ['action' => 'removed'];
        } else {
            Favourite::create(['id_user' => $userId, 'id_story' => $storyId]);
            return ['action' => 'added'];
        }
    }
}
