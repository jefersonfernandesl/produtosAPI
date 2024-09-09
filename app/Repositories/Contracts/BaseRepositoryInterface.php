<?php 

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface 
{
    public function all();
    public function find();
    public function store($data);
    public function update($id, $data);
    public function delete($id, $data);
}