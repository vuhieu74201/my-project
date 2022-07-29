<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getAllList()
    {
        return $this->model->all();
    }

    public function getListById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function pagination($quantity)
    {
        // TODO: Implement pagination() method.
    }
}