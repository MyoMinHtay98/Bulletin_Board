<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Services\PostService;
use App\Services\AuthService;
use App\Services\UserService;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private $authService, $userService, $postService, $categoryService;

    public function __construct(CategoryService $categoryService, UserService $userService, AuthService $authService, PostService $postService)
    {
        $this->caregoryService = $categoryService;
        $this->userService = $userService;
        $this->authService = $authService;
        $this->postService = $postService;
    }
   
}
