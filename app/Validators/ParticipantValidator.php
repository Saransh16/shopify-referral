<?php

namespace App\Validators;

class ParticipantValidator extends Validator
{
  protected function rules($data, $type)
  {
    $rules =  [];

    switch($type)
    {
      case 'create':
      $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:participants'
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