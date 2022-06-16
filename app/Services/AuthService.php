<?php

namespace App\Services;

use App\Contracts\Dao\AuthDaoInterface;
use App\Contracts\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthService implements AuthServiceInterface
{

    private $AuthDao;

    public function __construct(AuthDaoInterface $AuthDao)
    {
        $this->authDao = $AuthDao;
    }

    public function User()
    {
        return $this->authDao->User();
    }

    public function logout()
    {
        return $this->authDao->logout();
    }

}
