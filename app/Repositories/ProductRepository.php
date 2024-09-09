<?php 

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface 
{

    protected $model;

    public function __construct(Products $productsModel) 
    {
        $this->model = $productsModel;
    }

    public function all() 
    {
        return $this->model->all();
    }
    public function find()
    {
        
    }
    public function update($id, $data)
    {

    }
    public function delete($id, $data)
    {

    }
}