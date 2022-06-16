<?php

namespace App\Services;
 
use Auth;
use File;
use App\Models\User;
use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface {

    private $userDao;

    public function __construct(UserDaoInterface $UserDao)
    {
        $this->userDao = $UserDao;
    }

    /**
   * To get user by id
   * @param string $id user id
   * @return Object $user user object
   */
    public function getUserById($id)
    {
        return $this->userDao->getUserById($id);
    }

    /**
   * To get user list
   * @return array $userList list of users
   */
    public function getAllUsers()
    {
        return $this->userDao->getAllUsers();
    }

    /**
   * To create user with values from request
   * @param array $validated Validated values form request
   * @return Object created user object
   */
    public function userRegister($request, $userData)
    {
        $userData['password'] = bcrypt($userData['password']);

        $user = $this->userDao->createUser($userData);

        if ($request->hasfile('file_path')) {
            $file = $request->file('file_path');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path() . '/uploads/', $filename);
            $user->file_path = $filename;
        }
        $this->userDao->save($user);

        return $user;
    }

    /**
     * To update user with values from request
     * @param array $validated Validated values form request
     * @return Object created user object
     */
    public function updateUser($request, $userData, $user)
    {
        $userImage = $request->file_path;
        \Log::info($userImage);
        if (isset($userImage)) {
            $data = $this->userDao->getUserById($user->id);
          
            $fileName = $data['file_path'];
            if (File::exists(public_path() . '/uploads/' . $fileName)) {
                File::delete(public_path() . '/uploads/' . $fileName);
            }
            $file = $request->file('file_path');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $fileName); //move path to $fileName
            $userData['file_path'] = $fileName;
        }
        $user = $this->userDao->updateUser($user);

        return $user;
    }

    public function deleteUser($user)
    {
        $this->userDao->deleteUser($user);
    }

}
