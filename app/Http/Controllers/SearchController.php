<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Interfaces\SearchRepositoryInterface;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(SearchRequest $request): JsonResponse
    {
        // Lấy dữ liệu đã được validate
        $validatedData = $request->getValidatedData();

        // Thực hiện tìm kiếm
        $results = $this->searchRepository->searchStories($validatedData);

        // Trả về response với formatting mới
        return response()->json([
            'status' => 'success',
            'data' => [
                'results' => $results->map(function($story) {
                    return [
                        'id' => $story->id,
                        'title' => $story->title,
                        'story_image' => $story->story_image,
                        'view_count' => $story->formatted_view_count,
                        'like_count' => $story->formatted_like_count,
                        'author' => [
                            'id' => $story->author->id,
                            'name' => $story->author->name
                        ],
                        'categories' => $story->categories->map(function($category) {
                            return [
                                'id' => $category->id,
                                'name' => $category->name
                            ];
                        })
                    ];
                }),
                'meta' => [
                    'total' => $results->total(),
                    'page' => $results->currentPage(),
                    'limit' => $results->perPage(),
                    'total_pages' => $results->lastPage()
                ]
            ]
        ]);
    }
}