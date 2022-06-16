<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Services\PostService;
use App\Services\AuthService;
use App\Services\UserService;
use App\Services\CategoryService;

class AuthController extends Controller
{
    private $authService, $userService, $postService, $categoryService;

    public function __construct(CategoryService $categoryService, UserService $userService, AuthService $authService, PostService $postService)
    {
        $this->caregoryService = $categoryService;
        $this->userService = $userService;
        $this->authService = $authService;
        $this->postService = $postService;
    }

    /**
     * Show Login function
     *
     * @return view
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Login function
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:20'
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('user.profile.show');
        }
        return back()->with(["error" => "Your Email or Password Was Wrong"]);
    }

    /**
     * Logout function
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function logout(Request $request)
    {
        $this->authService->logout();
        return redirect()->route('login.show');
    }

}