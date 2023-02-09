<?php

namespace App\Validators;

class UserValidator extends Validator
{

  protected function rules($data, $type)
  {
    $rules =  [];

    switch($type)
    {
      case 'update':
        $rules = [
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'email' => "required|email|max:128|unique:users,email,".auth()->user()->id,
        ];
        break;

      case 'update-password':
        $rules = [
          'current_password' => 'required|min:8',
          'new_password' => 'required|min:8'
        ];
      break;        

      case 'import':
        $rules = [
          'file' => 'required|file'
        ];
      break;

      case 'create-reader':
        $rules = [
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'email' => 'required|email|max:128|unique:users'
        ];
      break;

      case 'upload-avatar':
        $rules = [
          'avatar' => 'required'
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
