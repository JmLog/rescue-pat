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
    public function all(array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->model->get($columns);
    }

    /**
     * @param int $id
     * @return Model
     */
    public function findId(int $id, array $columns = ['*'], array $relations = []): Model
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data = []): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data = []): bool
    {
        return $this->model->update($data);
    }

}
