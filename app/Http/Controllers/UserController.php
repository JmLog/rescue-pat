<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\Users\UserRepositoryInterface;
use App\Services\Users\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

}
