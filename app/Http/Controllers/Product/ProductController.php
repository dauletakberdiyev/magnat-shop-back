<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Product\FindHandler;
use App\Http\Handlers\Product\IndexHandler;
use App\Http\Handlers\Product\ShowHandler;
use App\Http\Handlers\Product\StoreHandler;
use App\Http\Handlers\Product\UpdateHandler;
use App\Http\Handlers\Product\UpdateIsExistHandler;
use App\Http\Requests\Product\FindRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateIsExistRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\Category\ProductResource;
use App\Http\Resources\Product\FindResource;
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

    public function find(FindRequest $request, FindHandler $handler): JsonResponse
    {
        $products = $handler->handle($request->getSearch());

        return $this->response(
            'Продукты возвращены успешно',
            FindResource::collection($products)
        );
    }

    public function updateIsExist(Product $product, UpdateIsExistRequest $request, UpdateIsExistHandler $handler): JsonResponse
    {
        return $this->response(
            'Продукт успешно изменен',
            new ProductResource($handler->handle($product, $request->getIsExist()))
        );
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return $this->response(
            'Продукт успешно удален',
            new ProductResource($product)
        );
    }

    public function update(Product $product, UpdateRequest $request, UpdateHandler $handler): JsonResponse
    {
        return $this->response(
            'Продукт успешно обновлен',
            new ProductResource($handler->handle($product, $request->getDto()))
        );
    }
}
