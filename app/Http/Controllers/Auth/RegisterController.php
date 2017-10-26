<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'phone_number' => 'required|max:13',
            // 'your_age' => 'required',
            // 'gender' => 'required',
            // 'avatar' => 'required|mimes:jpeg,jpg,png|max:1000',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // 'phone_number' => $data['phone_number'],
            // 'your_age' => $data['your_age'],
            // 'gender' => $data['gender'],
            // 'avatar' => $data['avatar'],

          ]);


    }
// protected function store(Request $request)
// {
//   $avatar = new User;
//
//   if (Input::hasFile('avatar')) {
//     $file = Input::file('avatar');
//     $name = time() . '-' . $file->getClientOriginalName();
//     $file = $file->move(public_path().'/img/', $name);
//     $avatar->avatar = $name;
//   }
//   $avatar->save();
// }

}
