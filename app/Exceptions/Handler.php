<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ErrorException;

class Handler extends ExceptionHandler{

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function report(Exception $exception){

        parent::report($exception);
    }

    public function render($request, Exception $exception){

        if($exception instanceof BadRequestHttpException){
            return response()->view('errors.400', [], 400);
        } else if($exception instanceof UnauthorizedHttpException){
            return response()->view('errors.401', [], 401);
        } else if($exception instanceof NotFoundHttpException){
            return response()->view('errors.404', [], 404);
        } else if($exception instanceof AccessDeniedHttpException){
            return response()->view('errors.403', [], 403);
        } else if($exception instanceof HttpException){
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $exception);
    }
}
