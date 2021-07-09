<?php

namespace moviemega\Http\Controllers\Auth;

use http\Env\Request;
use Illuminate\Support\Facades\Mail;
use moviemega\User;
use moviemega\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \moviemega\User
     */
    protected function create(array $data, Request $request)
    {
        if (!empty($request->user()->email)) {
            $random = Str::random(40);
            $data['confirmation_code'] = $random;
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'confirmation_code' => $data['confirmation_code']
            ]);

            // Send confirmation code

            Mail::send('emails.confirmation_code', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
            });
            return $user;
        }  else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        if (! $user)
            return redirect('/');
        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();
        return redirect('/movies')->with('notification', 'Has confirmado correctamente tu correo!');
    }



}
