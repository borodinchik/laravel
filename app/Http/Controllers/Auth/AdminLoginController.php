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

public function login(AdminLoginRequest $request)
  {
    //Attempt to login the user in
    if (Auth::guard('admin')->attempt([
          'email' => $request->email,
          'password' => $request->password],$request->remember))
      {
      //if successful, then redirect to their intendet location
          return redirect()->intended(route('admin.dashboard'));
        }
    //if unssuccessful, then redirect back to the login with from data
         return redirect()->back()->withInput($request->only('email','remember'));
  }
}
