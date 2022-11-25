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
  public function store(User $user)
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
    request()->validate([
      'firstname' => 'required',
    ]);
    $user->firstname = request('firstname');
    $user->save();
    return response()->json($user);
  }
  public function create()
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
  }
  public function show($id)
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
    //$user = User::where('is_active', 1)->findOrFail($id);
    $user = User::where([
      ['id',"=",$id],
      ['is_active',"=",1],
    ])->get();
    //$user = User::where('id',$id);
    return response()->json($user);
  }
  public function edit($id)
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
  }
  public function update($id)
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
    request()->validate([
      'firstname' => 'required',
    ]);
    $user = User::where('is_active', 1)->findOrFail($id);
    $user->firstname = request('firstname');
    $user->save();
    return response()->json($user);
  }
  public function destroy($id)
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    // $user = User::all();
    // return response()->json($user);
    $user = User::where('is_active', 1)->findOrFail($id);
    $user->is_active = 0;
    $user->save();
    return response()->json($user);
  }
}