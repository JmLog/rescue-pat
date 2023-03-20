<?php

namespace App\Services\Users;

use App\Repositories\Interfaces\Users\UserRepositoryInterface;

class UserService
{
    private $modelRepository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->modelRepository = $repository;
    }
}
