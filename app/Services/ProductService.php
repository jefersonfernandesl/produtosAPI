<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $productsRepository) 
    {
        $this->repository = $productsRepository;
    }

    public function all()
    {
        return ProductResource::collection($this->repository->all());
    }

    public function store($data) 
    {
        return $this->repository->store($data);
    }
}
