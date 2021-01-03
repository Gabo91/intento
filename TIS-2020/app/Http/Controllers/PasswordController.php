<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Auth;
use Session;
use Redirect;

class PasswordController extends Controller
{

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:usuario');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/password');
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
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */

    protected function cambiar(Request $request)
    {
        $rules = array(
            'password' => 'required|string|min:6|confirmed',
            'password-confirm' => 'password',
        );
        $validator = Validator::make (Input::all(), $rules);
        if ($validator->fails())
        {
            Session::flash('messagePass0','Error al cambiar contraseña, las contraseñas no coinciden');
            return redirect()->intended(route('cambiar.password.submit'));
        }
        else{
            $data = $request->all();
            $password = bcrypt($data['password']);
            $cargo = $data['cargo'];

            $usuario = Usuario::where('cod_sis', '=', $data['cod_sis'])->first();
            $usuario->password = $password;
            $usuario->save();

            Session::flash('messagePass1','Se ha cambiado la contraseña');
            $url = 'usuario.dashboard';
            switch ($cargo)
            {
                case 'Docente':
                    return redirect()->intended(route('usuario.dashboard'));
                    break;
                case 'Secretaria':
                    return redirect()->intended(route('secretaria.home'));
                    break;
                case 'Administrador':
                    return redirect()->intended(route('admin.home'));
                    break;
                case 'Jefe de Departamento':
                    return redirect()->intended(route('jefeDepartamento.home'));
                    break;
                case 'Auxiliar de Docencia':
                    return redirect()->intended(route('usuario.dashboard'));
                    break;
                case 'Auxiliar de Laboratorio':
                    return redirect()->intended(route('usuario.dashboard'));
                    break;
            }
        }
        /*
        $data = $request->all();
        $password = bcrypt($data['password']);
        $cargo = $data['cargo'];

        $usuario = Usuario::where('cod_sis', '=', $data['cod_sis'])->first();
        $usuario->password = $password;
        $usuario->save();
        switch ($cargo)
        {
            case 'Docente':
                return redirect()->intended(route('usuario.dashboard'));
                break;
            case 'Secretaria':
                return redirect()->intended(route('secretaria.home'));
                break;
            case 'Administrador':
                return redirect()->intended(route('admin.home'));
                break;
            case 'Jefe de Departamento':
                return redirect()->intended(route('jefeDepartamento.home'));
                break;
            case 'Auxiliar de Docencia':
                return redirect()->intended(route('usuario.dashboard'));
                break;
            case 'Auxiliar de Laboratorio':
                return redirect()->intended(route('usuario.dashboard'));
                break;
        }*/
    }
}
