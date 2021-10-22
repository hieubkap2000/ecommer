<?php

namespace App\Base;

use App\Base\RepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        $this->model->all();
    }
    public function find(array $conditions = [])
    {
        return $this->model->where($conditions)->get();
    }

    public function findOne(array $conditions)
    {
        return $this->model->where($conditions)->first();
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes = [])
    {
        return $model->update($attributes);
    }

    public function save(Model $model)
    {
        return $model->save();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
