<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UsuarioLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:usuario', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.usuario-login');
    }
    public function login(Request $request)
    {
        //validar datos
        $this->validate($request, [
            //'email' => 'required|email',
            $this->username() => 'required',
            'password' => 'required|min:6'
        ]);
            //intento de logearse
        if(Auth::guard('usuario')->attempt(['cod_sis' => $request->cod_sis, 'password' => $request->password], $request->remember)) {
            //si es exitoso redirigir a localizacion deseada
            $codSis = $request->cod_sis;
            include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
            //$conexion = pg_connect("host=localhost dbname=talos_db user=postgres password=1234") or die ('No se ha podido conectar: '.pg_last_error());
            $query=pg_query($conexion,"SELECT usuarios.cargo FROM usuarios WHERE usuarios.cod_sis = '".$codSis."';");
            $datos = pg_fetch_array($query);
            switch($datos['cargo'])
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
                case 'Auxiliar Docente':
                    return redirect()->intended(route('usuario.dashboard'));
                    break;
                case 'Auxiliar Laboratorio':
                    return redirect()->intended(route('usuario.dashboard'));
                    break;
            }
            //if($datos['cargo']=="Docente"){
                //return redirect()->intended(route('usuario.dashboard'));
            //}else{
                //return redirect()->intended(route('admin.home'));
            //}
            
        }
        //si falla, redireccionar al login
        return redirect()->back()
            ->withErrors([$this->username() => 'Datos incorrectos, intente de nuevo'])
            ->withInput($request->only('cod_sis')); //, 'remember'
    }
    public function logout()
    {
        Auth::guard('usuario')->logout();
        return redirect('/');
    }
    public function username()
    {
        return 'cod_sis'; //si se quiere cambiar por email cambiar aqui y en el .blade
    }
}
