<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Enums\Error;
use ErrorException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;
use Exception;

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
        /*
        $this->reportable(function (\Throwable $e, $request) {
            //
        });
        */

        $this->renderable(function (\Exception $e, $request) {
            if ($e->getPrevious() instanceof \Illuminate\Session\TokenMismatchException){  // throw
                return redirect()->back();
            }

            if ($request->is('api/*')) /** api middleware */ {
                /*
                $request->headers->add([
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ]);
                */

                if($e instanceof ModelNotFoundException){
                    $model = str_replace("App\\Models\\", "", $e->getModel()); // strips model name
                    return response()->json([
                        "message" => 'Model: ' . $model . ' not Found',
                        'status' => 404
                    ], 404);
                }
    
                if($e instanceof MethodNotAllowedHttpException){
                    return response()->json([
                        'message' => $e->getMessage(),
                        'status' => 405
                    ], 405);
                }

                if($e instanceof NotFoundHttpException || $e instanceof RouteNotFoundException   ){
                    return response()->json([
                        "message" => Error::RESOURCE_NOT_FOUND,
                        'status' => 404
                    ], 404);
                }

                if($e instanceof ValidationException){
                    return response()->json([
                        'message' => $e->getMessage(),
                        'status' => 400
                    ], 400);
                }

                if($e instanceof AccessDeniedHttpException || $e instanceof AuthorizationException){
                    return response()->json([
                        'message' => $e->getMessage(),
                        'status' => 403
                    ], 403);
                }                
            }
        });
    }
}
