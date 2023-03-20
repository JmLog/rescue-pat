<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model
     */
    public function findId(int $id): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data = []): Model;

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data = []): bool;

}
