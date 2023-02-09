<?php

namespace App\Http\Controllers\Api;

use Hash;
use Mail;
use App\Mail\EmailVerification;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Validators\AuthValidator;
use App\Exceptions\InvalidCredentialsException;
use App\Exceptions\EmailNotVerifiedException;
use Illuminate\Support\Arr;

class AuthController extends Controller
{

    public function __construct(AuthValidator $validator)
    {
        $this->validator = $validator;
    }


    public function register()
    {
        $inputs = request()->all();

        $this->validator->fire($inputs, 'register');

        $user = User::create([
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'phone_number' => '+1'.$inputs['phone_number'],
            'company_name' => $inputs['company_name'],
            'street_address' => $inputs['street_address'],
            'city' => $inputs['city'],
            'state' => $inputs['state'],
            'country' => $inputs['country']    
        ]);

        Mail::to($user->email)->queue(new EmailVerification($user));

        return response()->success($user);        
    }

    public function login()
    {
        $inputs = request()->only('email', 'password');

        $this->validator->fire($inputs, 'login');

        $valid = auth()->validate(
            Arr::only($inputs, ['email', 'password'])
        );        

        if (!$valid)
        {
            throw new InvalidCredentialsException('Invalid Credentials.');
        }        

        $user = User::whereemail($inputs['email'])->first();

        if($user)
        {
            if( $user->email_verified_at)
            {                
                auth()->loginUsingId($user->id);

                return response()->success($user);
            } 

            throw new EmailNotVerifiedException('Email Not Verified');
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json('User logged out successfully.');
    }
}

