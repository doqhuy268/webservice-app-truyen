<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\FavouriteRepositoryInterface;

class FavouriteController extends Controller
{
    private $favouriteRepository;

    public function __construct(FavouriteRepositoryInterface $favouriteRepository)
    {
        $this->favouriteRepository = $favouriteRepository;
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        $filters = $request->only(['page', 'limit', 'sort', 'order']);
        $favourites = $this->favouriteRepository->getUserFavourites($userId, $filters);

        return response()->json([
            'status' => 'success',
            'data' => $favourites,
            'meta' => [
                'total' => $favourites->total(),
                'page' => $favourites->currentPage(),
                'limit' => $favourites->perPage(),
            ],
        ]);
    }

    public function toggleFavourite($storyId)
    {
        $userId = auth()->id();
        $result = $this->favouriteRepository->toggleFavourite($userId, $storyId);

        return response()->json([
            'status' => 'success',
            'message' => "Story has been {$result['action']} to favourites.",
        ]);
    }
}