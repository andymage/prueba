<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        return redirect('login');
    }

    protected function validateLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $login = User::loginBam($email, $password);
        if ($login == 'PERMITIDO') {
            $datos = User::datosBam($email, $password);
            $email_con = $email . '@bam.com.mx';
            $userfind = User::where('email', '=', $email)->first();
            if (empty($userfind)) {
                $user = User::create([
                    'name' => $datos['nombre'],
                    'email' => $email,
                    'password' => bcrypt($password),
                    'area' => $datos['area'],
                    'subarea' => $datos['subarea'],
                    'puesto' => $datos['puesto'] 
                ]);
            }
            else{
                $userfind->password = bcrypt($password);
                $userfind->puesto = $datos['puesto'];
                $userfind->area = $datos['area'];
                $userfind->subarea = $datos['subarea'];
                $userfind->name = $datos['nombre'];
                $userfind->update();
            }
            $this->validate($request, [
                $this->username() => 'required', 
                'password' => 'required',
            ]);
        }
    }
}
