<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

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
    protected $redirectTo = '/register';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
            'ci' => 'required|unique:usuarios',
            'cod_sis' => 'required|unique:usuarios'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    protected function create(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
            'ci' => 'required|unique:usuarios',
            'cod_sis' => 'required|unique:usuarios',
            'telefono' => 'required',
        );
        $validator = Validator::make (Input::all(), $rules);
        if ($validator->fails())
            Session::flash('message0','Error al registrar usuario');
            //return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else{
            $usuario = new Usuario;
            $usuario->cod_sis = $request->cod_sis;
            $usuario->nombre = $request->name;
            $usuario->cargo = $request->cargo;
            $usuario->ci = $request->ci;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->id_departamento = $request->departamento;
            $usuario->password =  bcrypt($request['password']);
            $usuario->save();
            //return response()->json($usuario);
            //return redirect()->intended(route('admin.usuarios'));
            Session::flash('message','Usuario registrado con exito');
            //return redirect()->intended(route('admin.usuarios'));
        }
        return redirect()->intended(route('admin.usuarios'));
        
        /*Usuario::create([ //User
            'cod_sis' => $data['cod_sis'],
            'nombre' => $data['name'],
            'cargo' => $data['cargo'],
            'ci' => $data['ci'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect()->intended(route('admin.usuarios'));*/
    }
}
