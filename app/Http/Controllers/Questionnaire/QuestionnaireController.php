<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use App\Http\Handlers\Questionnaire\CreateHandler;
use App\Http\Handlers\Questionnaire\UpdateHandler;
use App\Http\Requests\Questionnaire\CreateRequest;
use App\Http\Requests\Questionnaire\UpdateRequest;
use App\Http\Resources\Questionnaire\CreateResource;
use App\Http\Resources\Questionnaire\IndexResource;
use App\Http\Resources\Questionnaire\UpdateResource;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class QuestionnaireController extends Controller
{
    public function create(CreateRequest $request, CreateHandler $handler): JsonResponse
    {
        return $this->response(
            'Questionnaire created successfully.',
            new CreateResource($handler->handle($request->getDTO())),
            Response::HTTP_CREATED
        );
    }

    public function update(Questionnaire $questionnaire, UpdateRequest $request, UpdateHandler $handler): JsonResponse
    {
        return $this->response(
            'Questionnaire updated successfully.',
            new UpdateResource($handler->handle($questionnaire, $request->getDTO()))
        );
    }

    public function index(): JsonResponse
    {
        $questionnaires = Questionnaire::all();

        return $this->response(
            'Questionnaires retrieved successfully.',
            IndexResource::collection($questionnaires)
        );
    }

    public function destroy(Questionnaire $questionnaire): JsonResponse
    {
        $questionnaire->delete();

        return $this->response(
            'Questionnaire deleted successfully.',
            $questionnaire
        );
    }
}
