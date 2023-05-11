<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Users\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index($id): View|Factory|Application
    {
        $user = $this->userService->getUserList($id);

        return view('user.info', [
            'info' => $user
        ]);
    }
}
