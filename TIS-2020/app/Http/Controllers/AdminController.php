<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Materia;
use App\Grupo;
use App\Horario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Session;
use Redirect;

class AdminController extends Controller
{
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
        return view('adminHome'); //return view('home');
    }
    public function indexmaterias()
    {
        return view('auth/registrarMaterias');
    }
    public function indexunidades()
    {
        return view('auth/registrarUnidades');
    }
    public function indexherramientas()
    {
        return view('auth/registrarPlataformasHerramientas');
    }
    public function indexusuarios()
    {
        return view('auth/register');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Materias
     */
    protected function creatematerias(Request $request)
    {
        $rules = array(
            'nombre' => 'required|string|max:255',
            'codigo_materia' => 'required',
            'id_departamento' => 'required',
        );
        $validator = Validator::make (Input::all(), $rules);
        if ($validator->fails())
            Session::flash('message0','Error al registrar materia, datos incorrectos');
            //return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else{
            $materia = new Materia;
            $materia->nombre = $request->nombre;
            $materia->codigo_materia = $request->codigo_materia;
            $materia->id_departamento = $request->id_departamento;
            $materia->save();
            Session::flash('message','Materia registrada con exito');
        }
        return redirect()->back();
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Grupos
     */
    
    protected function creategrupo(Request $request)
    {
        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
        $rules2 = array(
            'numero' => 'required',
            'id_materia' => 'required',
            'sis_docente' => 'required',
        );
        $validator2 = Validator::make (Input::all(), $rules2);
        if ($validator2->fails())
            Session::flash('message0','Error al registrar grupo, datos incorrectos');
            //return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else{
            if($request->sis_aux != null){
                $grupo = new Grupo;
                $grupo->numero = $request->numero;
                $grupo->id_materia = $request->id_materia;
                $grupo->sis_usuario = $request->sis_aux;
                $grupo->save();
                //$aux = $request['sis_aux'];
                //$num = $request['numero'];
                //$mat = $request['id_materia'];
                //$sqlaux = "INSERT INTO grupos (".$aux.", ".$num.", ".$mat.") VALUES ('sis_usuario', 'numero', 'id_materia');";
                //pg_query($conexion, $sqlaux)->save();
            }
            $grupo = new Grupo;
            $grupo->numero = $request->numero;
            $grupo->id_materia = $request->id_materia;
            $grupo->sis_usuario = $request->sis_docente;
            $grupo->save();
            Session::flash('message','Grupo registrado con exito');
            $todos = $request->all();
            $sqlmat = pg_query($conexion,"SELECT id FROM grupos 
                WHERE grupos.sis_usuario = ".$todos['sis_docente']." AND grupos.id_materia = ".$todos['id_materia']." AND grupos.numero = ".$todos['numero'].";");
            $datos = pg_fetch_array($sqlmat);
            $idmate = $datos['id'];
            if($request->horarioLunes != null){
                $horaentera = $todos['horarioLunes'];
                $hora = explode("-", $horaentera);
                $lunes = "Lunes";
                $horario = new horario;
                $horario->dia = $lunes;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
            if($request->horarioMartes != null){
                $horaentera = $todos['horarioMartes'];
                $hora = explode("-", $horaentera);
                $dia = "Martes";
                $horario = new horario;
                $horario->dia = $dia;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
            if($request->horarioMiercoles != null){
                $horaentera = $todos['horarioMiercoles'];
                $hora = explode("-", $horaentera);
                $dia = "Miercoles";
                $horario = new horario;
                $horario->dia = $dia;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
            if($request->horarioJueves != null){
                $horaentera = $todos['horarioJueves'];
                $hora = explode("-", $horaentera);
                $dia = "Jueves";
                $horario = new horario;
                $horario->dia = $dia;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
            if($request->horarioViernes != null){
                $horaentera = $todos['horarioViernes'];
                $hora = explode("-", $horaentera);
                $dia = "Viernes";
                $horario = new horario;
                $horario->dia = $dia;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
            if($request->horarioSabado != null){
                $horaentera = $todos['horarioSabado'];
                $hora = explode("-", $horaentera);
                $dia = "Sabado";
                $horario = new horario;
                $horario->dia = $dia;
                $horario->hora_inicio = $hora[0];
                $horario->hora_fin = $hora[1];
                $horario->id_grupo = $idmate;
                $horario->save();
            }
        }
        //return redirect()->intended(route('admin.materias'));
        return redirect()->back();
    }
    /////////////SECRETARIA//////////////
}
