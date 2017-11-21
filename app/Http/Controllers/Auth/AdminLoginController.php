<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin');
  }
  public function showLoginForm()
  {
    return view('auth.admin-login');
  }
  //Attempt to login the user in
  public function login(AdminLoginRequest $request)
  {
    if (Auth::guard('admin')->attempt([
      'email' => $request->email,
      'password' => $request->password],$request->remember))
    {
      return redirect()->intended(route('admin.dashboard'));//if successful, then redirect to their intendet location
    }
    return redirect()->back()->withInput($request->only('email','remember'));
  }
}
