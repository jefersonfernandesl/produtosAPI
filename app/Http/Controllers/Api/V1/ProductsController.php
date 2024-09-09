<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Exceptions\ApiException;
use App\Http\Requests\CreateProductFormRequest;
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
        if (count($products->collection) === 0) {
            return throw new ApiException('Ouve um erro ao procurar os produtos.', 500);
        }

        return response()->json(['status' => 'sucesso', 'data' => $products], 200);
    }

    public function store(CreateProductFormRequest $request)
    {   
        try {
            $product = $this->service->store($request);
            if (!$product) {
                return response()->json(['status' => 'falha'], 400);
            }
            return response()->json(['status' => 'sucesso', 'data' => $product], 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
