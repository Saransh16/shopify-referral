<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
  function __construct($message)
  {      
    parent::__construct($message);
  }
}
