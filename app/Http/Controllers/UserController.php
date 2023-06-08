<?php

namespace App\Http\Controllers;

use App\Services\Users\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->userService->getUserList();
    }

    public function find(): Model
    {

    }

    public function findAdmin(): Collection
    {
        return $this->userService->getAdminUsers();
    }

}
