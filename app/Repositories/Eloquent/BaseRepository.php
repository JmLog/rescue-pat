<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    private Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection;
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
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

    /**
     * @param array $data
     * @return bool
     */
    public function delete(array $data = []): bool
    {
        return $this->model->delete($data);
    }

}
