<?php

namespace App\Validators;

class CampaignValidator extends Validator
{
  protected function rules($data, $type)
  {
    $rules =  [];

    switch($type)
    {
      case 'create':
      $rules = [
        'title' => 'required|max:255',
        'description' => 'required',
        'domain' => 'required|url',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'rules' => 'required',
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