<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;
use File;
use Auth;

class UserDao implements UserDaoInterface
{

/**
 * To get user by id
 * @param string $id user id
 * @return Object $user user object
 */
    public function getUserById($id)
    {
        $user = User::findorFail($id);
        return $user;
    }

    /**
     * To get user list
     * @return array $userList list of users
     */
    public function getAllUsers()
    {
        $userList = User::Paginate(5);
        return $userList;
    }

    /**
     * To create user
     * @param array $validated Validated values form request
     * @return Object created user object
     */
    public function createUser($data)
    {
        return User::create($data);
    }

    /**
     * To save user data
     * @param array $validated Validated values form request
     * @return Object created user object
     */
    public function save($user)
    {
        return $user->save();
    }

    /**
     * To update user
     * @param array $validated Validated values form request
     * @return Object created user object
     */
    public function updateUser($user)
    {
        $result = $user->update();
        return $result;
    }

     /**
     * To delete user
     * @param array $validated Validated values form request
     * @return Object created user object
     */
    public function deleteUser($user)
    {   
        return $user->delete();
    }

}
