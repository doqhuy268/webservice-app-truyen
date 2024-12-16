<?php

namespace App\Interfaces;

interface AuthorRepositoryInterface
{
    public function getAll($filters = [], $paginate = false, $perPage = 10);
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
