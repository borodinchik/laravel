<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Input ;
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
    protected $redirectTo = '/user';

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
            'phone_number' => 'required|numeric|max:13',
            'your_age' => 'required|date',
            'gender' => 'required|string',
            'avatar' => 'required|mimes:jpeg,jpg,png|max:1000',
          ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * Добавляет фото юзера
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $fileName = 'null';
      if (Input::file('avatar')->isValid()) {
        $destanetionPath = public_path('uploads/user_avatar');
        $extension = Input::file('avatar')->getClientOriginalExtension();
        $fileName = uniqid(). '.' .$extension;
        Input::file('avatar')->move($destanetionPath, $fileName);
      }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'your_age' => $data['your_age'],
            'gender' => $data['gender'],
            'avatar' => $fileName,



          ]);
    //       if (Input::hasFile('avatar')) {
    //         $file = Input::file('avatar');
    //         $name = time() . '-' . $file->getClientOriginalName();
    //         $file = $file->move(public_path().'/img/', $name);
    //         $avatar->avatar = $name;
    //
    //
    // }
    // $avatar->save();

}
}
