<?php
namespace App\Interfaces;

interface SearchRepositoryInterface
{
    /**
     * Search stories based on various criteria
     * 
     * @param array $params Search parameters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchStories(array $params);
}