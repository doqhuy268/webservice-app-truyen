<?php
namespace App\Repositories;

use App\Models\Story;
use App\Interfaces\SearchRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SearchRepository implements SearchRepositoryInterface
{
    protected $model;

    public function __construct(Story $story)
    {
        $this->model = $story;
    }

    public function searchStories(array $params): LengthAwarePaginator
    {
        $query = $this->model->query();

        // Sử dụng scope search mới từ model
        if (!empty($params['query'])) {
            $query->when($params['type'] === 'all', function ($q) use ($params) {
                return $q->search($params['query']);
            });

            // Các filter cụ thể theo type
            $query->when($params['type'] === 'story', function ($q) use ($params) {
                return $q->where('title', 'like', "%{$params['query']}%");
            })
            ->when($params['type'] === 'author', function ($q) use ($params) {
                return $q->whereHas('author', function ($authorQ) use ($params) {
                    $authorQ->where('name', 'like', "%{$params['query']}%");
                });
            })
            ->when($params['type'] === 'category', function ($q) use ($params) {
                return $q->whereHas('categories', function ($categoryQ) use ($params) {
                    $categoryQ->where('name', 'like', "%{$params['query']}%");
                });
            });
        }

        // Sắp xếp
        $query->orderBy(
            $params['sort'] ?? 'created_at', 
            $params['order'] ?? 'desc'
        );

        // Thêm select để giới hạn các trường được trả về
        $query->select([
            'id', 
            'title', 
            'story_image', 
            'view_count', 
            'like_count', 
            'id_author', 
            'created_at'
        ]);

        // Paginate với các trường bổ sung
        return $query->paginate(
            $params['limit'] ?? 20, 
            ['*'], 
            'page', 
            $params['page'] ?? 1
        );
    }
}