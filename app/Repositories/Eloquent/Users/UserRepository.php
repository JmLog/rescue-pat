<?php

namespace App\Repositories\Eloquent\Users;


use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\Users\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getAdmin(): Collection
    {
        return $this->model->where('qualification', 'admin')->all();
    }


}
