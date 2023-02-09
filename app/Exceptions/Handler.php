<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException as BaseValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Validation\ValidationException::class,
        \App\Exceptions\InvalidCredentialsException::class,        
        \App\Exceptions\EmailNotVerifiedException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($request->is('api/*') || $request->expectsJson())
        {
            return $this->renderExceptions($request, $exception);
        }

        return parent::render($request, $exception);
    }

    protected function renderExceptions($request, $e)
    {
        switch($e)
        {
            case ($e instanceof BaseValidationException):
                return response()->error($e->errors(), 422);

            case ($e instanceof InvalidCredentialsException):
                return response()->message('Invalid Credentials.', 400);

            case ($e instanceof EmailNotVerifiedException):
                return response()->message('Email Not Verified.', 400);                
            
            default:
                return parent::render($request, $e);
        }
    }    
}
