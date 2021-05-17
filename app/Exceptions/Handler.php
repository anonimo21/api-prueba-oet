<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            //return $this->errorResponse("Página no encontrada", $code = 404, $msj = 'Página no encontrada');
            return response()->json([
                'msg' => 'Página no encontrada',
                'status' => false,
            ], 404);
        }

        if ($exception instanceof ModelNotFoundException) {
            //return $this->errorResponse("Recurso no encontrado", $code = 404, $msj = 'Recurso no encontrado');
            return response()->json([
                'msg' => 'Recurso no encontrado',
                'status' => false,
            ], 404);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'msg' => 'No autorizado',
                'status' => false,
            ], 403);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'msg' => 'No se puede ejecutar la consulta',
                'status' => false,
            ], 403);
        }

        return parent::render($request, $exception);
    }
}
