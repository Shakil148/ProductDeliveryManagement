<?php

namespace SGFL\Http\Controllers\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use SGFL\User;
use SGFL\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;


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
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'contact' => ['required', 'string', 'min:11','max:11'],
            'role' => 'required | in:admin,moderator,tsm,accounts,factoryIncharge,viewer',
        ]);
  
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \SGFL\User
     */
    protected function create(array $data)
    {
        return $user = User::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'designation' => $data['designation'],
            'image' => $data['image'],
            'role' => $data['role'],
        ]);

    }
     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    //return $this->registered($request, $user)
            //?: redirect()->intended($this->redirectPath());
    protected $redirectTo = '/user';
}
