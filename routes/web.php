<?php

use Illuminate\Support\Facades\Route;

Route::get('/email-verification', function () {
    $token = request()->token;
    if(!$token) abort(404);

    $decrypted_token = decrypt($token);
    $decrypted_token = explode("|", $decrypted_token);
    $email = \Arr::get($decrypted_token, 0);
    $user = \App\Models\User::whereEmail($email)->first();

    if(!$user) abort(404);

    if(!$user->email_verified_at) {
        $user->email_verified_at = carbon()->now();
        $user->save();
    }

    auth()->loginUsingId($user->id);
    
    return redirect('admin/dashboard')->with('session_message', 'Congrats! Your email has been verified.');

})->name('email-verification');


Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
