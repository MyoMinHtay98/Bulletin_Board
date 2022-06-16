<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function getUserById($id);

    public function getAllUsers();

    public function createUser($data);

    public function save($user);

    public function updateUser($data);

    public function deleteUser($user);
}
