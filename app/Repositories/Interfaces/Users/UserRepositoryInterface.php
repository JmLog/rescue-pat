<?php

namespace App\Repositories\Interfaces\Users;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAdmin(): Collection;

}
