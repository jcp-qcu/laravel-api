<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
    $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
    $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
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
  public function login()
  {
    //dd($user->all());
    $result = User::where([
      ['email',"=", request('email')],
      ['password',"=",request('password')],
      ['is_active',"=",1],
    ])->get();
    return response()->json($result);
  }
  public function staffs()
  {
    // $user = User::where('is_deleted', false)->orderBy('updated_at', 'desc')->paginate(10);
    $user = User::where([
      ['role',"=",'STAFF'],
      ['is_active',"=",1],
    ])->get();
    return response()->json($user);
  }
}