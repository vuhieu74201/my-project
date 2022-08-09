<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function getListById($id);

    public function create(array $data);

    public function update($id, $data);

    public function delete($id);

    public function search($name = "");

}