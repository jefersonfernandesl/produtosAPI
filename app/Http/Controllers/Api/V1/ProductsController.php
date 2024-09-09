<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductsController extends Controller
{
    protected $service;

    public function __construct(ProductService $productService) 
    {
        $this->service = $productService;
    }

    public function all()
    {
        $products = $this->service->all();
        if(!$products) {
            
        }
    }
}
