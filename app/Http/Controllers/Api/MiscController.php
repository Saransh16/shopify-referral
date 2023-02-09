<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiscController extends Controller
{

  public function listStates()
  {
    return response()->success(config('states'));
  }

}
