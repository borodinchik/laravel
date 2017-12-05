<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserListsContriller extends Controller
{
  // public function __construct()
  // {
  //   // $this->middleware('auth:admin');
  // }
  public function showAllUsers(User $users)
  {
    $users = $users->all();
    return view('admins.all_users', compact('users'));
  }
}
