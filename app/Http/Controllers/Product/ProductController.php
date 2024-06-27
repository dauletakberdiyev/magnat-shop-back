<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Product\IndexHandler;
use App\Http\Handlers\Product\ShowHandler;
use App\Http\Handlers\Product\StoreHandler;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Resources\Product\IndexResource;
use App\Http\Resources\Product\ShowResource;
use App\Http\Resources\Product\StoreResource;
use App\Models\Product;
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

    public function show(Product $product, ShowHandler $handler): JsonResponse
    {
        return $this->response(
            'Продукт возвращен успешно',
            new ShowResource($handler->handle($product->id))
        );
    }
}
