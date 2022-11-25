<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    $user = User::all();
    return response()->json($user);
  }
}