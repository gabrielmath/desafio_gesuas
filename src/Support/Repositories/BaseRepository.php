<?php

namespace Source\Support\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data): mixed
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        $record = $this->model->find($id);
        return $record->delete();
    }
}
