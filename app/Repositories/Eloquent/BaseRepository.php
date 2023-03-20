<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements EloquentRepositoryInterface
{
    private Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->model::paginate();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findId(int $id): Model
    {
        return $this->model::find($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data = []): Model
    {
        return $this->model::create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data = []): bool
    {
        return $this->model::update($data);
    }

}
