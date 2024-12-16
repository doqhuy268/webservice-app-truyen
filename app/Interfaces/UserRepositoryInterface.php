<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUserById($id);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function getAllUsers();
}
