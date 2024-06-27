<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Product\IndexHandler;
use App\Http\Handlers\Product\StoreHandler;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Resources\Product\IndexResource;
use App\Http\Resources\Product\StoreResource;
use Illuminate\Http\JsonResponse;

final class ProductController extends Controller
{
    public function store(StoreRequest $request, StoreHandler $handler): JsonResponse
    {
        $newProduct = $handler->handle($request->getDto());

        return $this->response(
            'Продукт создан успешно',
            new StoreResource($newProduct)
        );
    }

    public function index(IndexHandler $handler): JsonResponse
    {
        $products = $handler->handle();

        return $this->response(
            'Все продукты возвращены',
            IndexResource::collection($products)
        );
    }
}
