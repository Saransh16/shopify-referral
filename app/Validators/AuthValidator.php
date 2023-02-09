<?php

namespace App\Validators;

class AuthValidator extends Validator
{

  protected function rules($data, $type)
  {
    $rules =  [];

    switch($type)
    {
      case 'register':
      $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'phone_number' => 'required|numeric',
        'password' => 'required|min:8',
        'company_name' => 'required|max:255',
        'street_address' => 'required|max:255',
        'city' => 'required|max:255',
        'state' => 'required|max:255',
        'zip' => 'required|numeric',
      ];
      break;

      case 'login':
      $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
      ];
      break;

      case 'password-reset-email':
      $rules = [
        'email' => 'required|email|exists:users'
      ];
      break;

      case 'password-reset':
        $rules = [
          'email' => 'required|email|exists:password_resets',
          'token' => 'required|exists:password_resets',
          'password' => 'required|confirmed|min:8',
          'password_confirmation' => 'required|min:8',
        ];
      break;
    }

    return $rules;
  }


  protected function getAttributeNamesForHuman($type)
  {
    $attributes =  [];

    return $attributes;
  }

  protected function messages($type)
  {
    $messages = [];

    return $messages;
  }
}
