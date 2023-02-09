<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Response::macro('success', function ($data, $status = 200, $code = null) {
            $code = is_null($code) ? $status : $code;

            return response()->json([
                'success'  => true,
                'code' => $code,
                'data' => $data
            ], $status);
        });        

        \Response::macro('error', function ($errors, $status = 400, $code = null) {
            $errors = is_array($errors) ? $errors : ['message' => $errors];

            $code = is_null($code) ? $status : $code;

            return response()->json([
                'success'  => false,
                'code' => $code,
                'errors' => $errors
            ], $status);
        });        

        \Response::macro('message', function ($message, $status = 200, $code = null) {

            $code = is_null($code) ? $status : $code;

            return response()->json([
                'success'  => false,
                'code' => $code,
                'message' => $message
            ], $status);            
        });
    }
}
