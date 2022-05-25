<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Http\ApiV1\Modules\Actors\Controllers\EmptyResourceController;
use App\Http\ApiV1\Modules\Actors\Resources\ActorsResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\ApiV1\Modules\Casts\Controllers\CastsController;
use App\Http\ApiV1\Modules\Casts\Resources\CastsResource;
use App\Http\ApiV1\Modules\Films\Controllers\FilmsController;
use App\Http\ApiV1\Modules\Films\Resources\FilmsResource;
use App\Http\ApiV1\Modules\Actors\Resources\EmptyResource;
use App\Http\ApiV1\Modules\Actors\Resources\ErrorPathResource;
use Illuminate\Validation\ValidationException;
use Throwable;
use TypeError;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof NotFoundHttpException)
        {
            return response()->json(new ErrorPathResource($request), 404);
        }

        if ($request->is('api/v1/*')) {
            if ($e instanceof ModelNotFoundException) {
                EmptyResourceController::$code = 404;
                EmptyResourceController::$message = $e->getMessage();
                return response()->json(new EmptyResource($request), 404);
            }
            if ($e instanceof ValidationException || $e instanceof TypeError) {
                EmptyResourceController::$code = 400;
                EmptyResourceController::$message = $e->getMessage();
                return response()->json(new EmptyResource($request), 400);
            }

            EmptyResourceController::$code = 500;
            EmptyResourceController::$message = $e->getMessage();
            return response()->json(new EmptyResource($request), 500);
        }

        return parent::render($request, $e);
    }
}