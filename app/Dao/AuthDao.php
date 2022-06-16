<?php

namespace App\Dao;

use Auth;
use App\Contracts\Dao\AuthDaoInterface;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;

class AuthDao implements AuthDaoInterface
{
    public function User()
    {
        return Auth::user();
    }

    public function logout()
    {
        Session::flush();
        return  Auth::logout();
    }

}
