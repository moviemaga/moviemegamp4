<?php

namespace moviemega\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use moviemega\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use moviemega\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    //// formulario
    public function  reiniciopassform(){
        return view('auth.passwords.email');
    }

    //// formulario
    public function  actualizarpassform($token,$email){

        return view('auth.passwords.reset',compact('token','email'));
    }

    public function reiniciopass(Request $request)
    {   $email= request('email');
        $random = Str::random(40);
        $user = User::where('email', $email)->first();
        $user->remember_token = $random;
        $user->save();
        $datos=[
            "email"=>$email,
            "remember_token"=>$random
        ];
        // Send confirmation code
        Mail::send('emails.reiniciarpass', $datos, function($message)  {
            $message->to('luislocoxcristo@gmail.com',"Luis Enrique Ruano de Leon")->subject('Por favor confirma tu correo');
        });
        return redirect('/')->with('notification', 'Te enviamos un correo para reinicio de contraseña');
    }

    public function actualizarpass(Request $request)
    {
        $validator = $this->validate($request, [
            'email' => 'required|string|max:75',
            'password' => 'required|string|max:75',
            'token' => 'required|string|max:75'
        ]);
        try {
            $email = request('email');
            $token = request('token');
            $pass = request('password');
            $pass2 = request('password_confirmation');
            $user = User::where('email', $email)->first();
            if ($user['remember_token'] == $token) {
                $user->remember_token = null;
            } else {
                return redirect('/actualizarpassform/' . $token . '/' . $email)->with('token no validado, la contraseña no coincide!');
            }

            if($pass==$pass2){
                $user->password = Hash::make($pass);
                $user->save();
                return redirect('/login')->with('notification', 'Has actualizado tu contraseña corrctamente!');
            } else {
                return redirect('/actualizarpassform/' . $token . '/' . $email)->with('notification', 'la contraseña no coincide!');
            }

        }  catch (Exception $e) {
            return redirect('/actualizarpassform/' . $token . '/' . $email)->with('notification', 'Error al enviar información!');
        }
    }


}
