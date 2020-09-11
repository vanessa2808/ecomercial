<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers();

    public function createUser(array $data);

    public function findUsers($id);

    public function updateUser($id, array $attributes);

    public function deleteUser($id);

}
