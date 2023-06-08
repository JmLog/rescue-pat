<?php

namespace App\Services\Users;

use App\Repositories\Interfaces\Users\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    private $modelRepository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->modelRepository = $repository;
    }

    /**
     * @return Collection
     */
    public function getUserList(): Collection
    {
        return $this->modelRepository->all();
    }

    /**
     * @return Collection
     */
    public function getAdminUsers(): Collection
    {
        return $this->modelRepository->getAdmin();
    }
}
