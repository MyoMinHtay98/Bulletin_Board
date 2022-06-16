<?php

namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function getUserById($id);

    public function getAllUsers();

    public function userRegister($request, $userData);

    public function updateUser($request, $userData, $user);

    public function deleteUser($user);
}