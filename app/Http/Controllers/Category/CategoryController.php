<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Category\AddSubCategoryHandler;
use App\Http\Handlers\Category\MainHandler;
use App\Http\Handlers\Category\MenuHandler;
use App\Http\Handlers\Category\ProductsHandler;
use App\Http\Handlers\Category\ShowHandler;
use App\Http\Handlers\Category\StoreHandler;
use App\Http\Handlers\Category\UpdateHandler;
use App\Http\Requests\Category\AddSubCategoryRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\MainResource;
use App\Http\Resources\Category\MenuResource;
use App\Http\Resources\Category\PaginationResource;
use App\Http\Resources\Category\StoreResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

final class CategoryController extends Controller
{
    public function main(MainHandler $handler): JsonResponse
    {
        return $this->response(
            'All categories returned',
            new PaginationResource($handler->handle())
        );
    }

    public function show(Category $category, ShowHandler $handler): JsonResponse
    {
        return $this->response(
            'Category products returned',
            new CategoryResource($handler->handle($category->id))
        );
    }

    public function menu(MenuHandler $handler): JsonResponse
    {
        return $this->response(
            'All menu returned',
            MenuResource::collection($handler->handle())
        );
    }

    public function store(StoreRequest $request, StoreHandler $handler): JsonResponse
    {
        return $this->response(
            'New category save successfully',
            new StoreResource($handler->handle($request->getTitleKz(), $request->getTitleRu(), $request->getSubcategories()))
        );
    }

    public function products(ProductsHandler $handler): JsonResponse
    {
        return $this->response(
            'All products returned',
            MainResource::collection($handler->handle())
        );
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return $this->response(
            'Category deleted successfully',
            new MenuResource($category)
        );
    }

    public function update(Category $category, UpdateRequest $request, UpdateHandler $handler): JsonResponse
    {
        return $this->response(
            'Category updated successfully',
            new MenuResource($handler->handle($category, $request->getDTO()))
        );
    }

    public function addSubCategory(Category $category, AddSubCategoryRequest $request, AddSubCategoryHandler $handler): JsonResponse
    {
        $handler->handle($category, $request->getDTO());

        return $this->response(
            'Category subcategories returned',
            []
        );
    }
}
