<?php

namespace App\Repositories\Eloquent\Auth;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
