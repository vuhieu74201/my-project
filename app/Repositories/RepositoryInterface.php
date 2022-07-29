<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAllList();
    public function getListById($id);
    public function create(array $data);
    public function update($id,$data);
    public function delete($id);
    public function pagination($quantity);
}