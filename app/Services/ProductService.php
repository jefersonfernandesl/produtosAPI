<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $productsRepository) 
    {
        $this->repository = $productsRepository;
    }

    public function all()
    {
        return $this->repository->all();
    }
}
