<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function list()
  {
    $users = User::latest()->paginate(15);

    return response()->json(['users' => $users]);
  }
}
