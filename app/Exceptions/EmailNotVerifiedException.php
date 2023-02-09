<?php

namespace App\Exceptions;

use Exception;

class EmailNotVerifiedException extends Exception
{
  function __construct($message)
  {      
    parent::__construct($message);
  }
}
