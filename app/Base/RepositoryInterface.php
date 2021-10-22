<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface RepositoryInterface
{

    public function getAll();

    public function find(array $conditions = []);

    public function findOne(array $conditions);

    public function findById(int $id);

    public function create(array $attributes);

    public function update(Model $model, array $attributes = []);

    public function save(Model $model);

    public function delete(Model $model);
}
