<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\PostService;
use App\Services\UserService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $authService, $userService, $postService;

    public function __construct(UserService $userService, AuthService $authService, PostService $postService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
        $this->postService = $postService;
    }

     /**
     * show all users
     *
     * @return void
     */
    public function show()
    {
        $users = $this->userService->getAllUsers();
        return view('user.list', compact('users'));
    }

     /**
     * show user details
     *
     * @param int $id
     * @return array
     */
    public function showDetails($id)
    {
        $user = $this->userService->getUserById($id);

        return view('user.details', compact('user'));
    }

    /**
     * user profile
     *
     * @return void
     */
    public function profile()
    {
        $user = $this->authService->User();
        return view('user.profile', compact('user'));
    }

     /**
     * show register page
     *
     * @return void
     */
    public function showRegister()
    {
        $users = $this->userService->getAllUsers();

        return view('user.register', compact('users'));
    }

    /**
     * register user
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:user,email',
            'password' => 'required|min:8|max:50',
            'gender' => 'required',
            'role' => 'required|boolean',
            'dob' => 'required|date',
            'age' => 'required|numeric',
            'hobby' => 'required|max:100',
            'address' => 'required|max:100',
            'file_path' => 'required',
        ]);

        $this->userService->userRegister($request, $userData);
       
        return redirect()->route('user.list');
    }

     /**
     * show profileEdit page
     *
     * @param int $id
     * @return void
     */
    public function showProfileEdit()
    {
        $user = $this->authService->User();

        return view('user.profileEdit', compact('user'));
    }

    /**
     * profileEdit user
     *
     * @param Request $request
     * @return void
     */
    public function profileEdit(Request $request)
    {
        // $userData = $request->validate([
        //     'name' => 'required|max:50',
        //     'email' => 'required|email|max:50|unique:user,email,'.$request->id,
        //     'password' => 'required|min:8|max:50',
        //     'gender' => 'required',
        //     'role' => 'required|boolean',
        //     'dob' => 'required|date',
        //     'age' => 'required|numeric',
        //     'hobby' => 'required|max:100',
        //     'address' => 'required|max:100',
        //     'file_path' => 'required',
        // ]);
        $userData = $request->all();
        $user= $this->authService->User();
        
        $this->userService->updateUser($request, $userData, $user);

        return redirect()->route('user.profile.show');
    }

   /**
     * delete user
     *
     * @return void
     */
    public function delete($id)
    {
        $user = $this->userService->getUserById($id);
        $this->userService->deleteUser($user);

        return redirect()->back();
    }

}
