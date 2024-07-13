<?php

namespace App\Http\Controllers\QuestionnaireDetails;

use App\Http\Controllers\Controller;
use App\Http\Handlers\QuestionnaireDetails\CreateHandler;
use App\Http\Requests\QuestionnaireDetails\CreateRequest;
use App\Http\Resources\QuestionnaireDetails\CreateResource;
use App\Models\Questionnaire;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class QuestionnaireDetailsController extends Controller
{
    public function create(Questionnaire $questionnaire, CreateRequest $request, CreateHandler $handler): JsonResponse
    {
        return $this->response(
            'Questionnaire Details successfully created.',
            CreateResource::collection($handler->handle($questionnaire->id, $request->getDTO())),
            Response::HTTP_CREATED
        );
    }
}
