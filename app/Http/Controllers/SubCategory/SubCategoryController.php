<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Category\SubCategoryHandler;
use App\Http\Handlers\SubCategory\StoreHandler;
use App\Http\Requests\SubCategory\StoreRequest;
use App\Http\Resources\Category\SubCategoryDTOResource;
use App\Http\Resources\SubCategory\StoreResource;
use App\Models\SubCategories;
use Illuminate\Http\JsonResponse;

final class SubCategoryController extends Controller
{
    public function store(StoreRequest $request, StoreHandler $handler): JsonResponse
    {
        return $this->response(
            'New Sub Category created successfully',
            new StoreResource($handler->handle($request->getDto()))
        );
    }

    public function products(SubCategories $subCategory, SubCategoryHandler $handler): JsonResponse
    {
        return $this->response(
            'Sub category products returned',
            new SubCategoryDTOResource($handler->handle($subCategory->category, $subCategory))
        );
    }
}
