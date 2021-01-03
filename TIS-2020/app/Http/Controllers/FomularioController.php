<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\Fomulario;
use App\Plataforma;
use Auth;

class FomularioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /**public function __construct ()
  * {
  *    $this->middleware('auth:usuario');
  *}
  */
public function index(){
  $post = Fomulario::paginate(6);
  $plataformas = Plataforma::all();

  return view('post.index')->with(['post'=>$post, 'plataformas'=>$plataformas]);
}

public function addPost(Request $request){
  if($request -> get('tipo_clase')=='normal'){
  $rules = array(
    'tipo_clase' => 'required',
    'modalidad' => 'required',
    //'reposicion' => 'required',
    'dia_clase' => 'required',
    //'dia_reposicion' => 'required',
    'contenido' => 'required',
    'observaciones' => 'required',
    'url' => 'url|nullable',
    //'subir_contenido'=>'required',
  );
}else{
  $rules = array(
    'tipo_clase' => 'required',
    'modalidad' => 'required',
    'reposicion' => 'required',
    'dia_clase' => 'required',
    'dia_reposicion' => 'required',
    'contenido' => 'required',
    'observaciones' => 'required',
    'url' => 'url|nullable',
    //'subir_contenido'=>'required',
  );
}
$validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $todos = $request->all();
    $fechaRep = $todos['reposicion'];
    //$newDate1 = date("d/m/Y", strtotime($fechaRep));////probar con estos 2 en caso de que siga saliendo el error de fecha
    $newDate1 = date("Y/m/d", strtotime($fechaRep)); //comentar este
    $diarepuesto = $todos['dia_reposicion'];
    //$newDate0 = date("d/m/Y", strtotime($diarepuesto));////probar con estos 2 en caso de que siga saliendo el error de fecha
    $newDate0 = date("Y/m/d", strtotime($diarepuesto));//comentar este

    $post = new Fomulario();
    $post->tipo_clase = $request->tipo_clase;
    $post->modalidad = $request->modalidad;
    $post->reposicion = $newDate1;//$request->reposicion;
    $post->dia_clase = $request->dia_clase;
    $post->dia_reposicion = $newDate0; //$request->dia_reposicion;
    $post->plataformas = $request->plataformas;
    $post->herramientas = $request->herramientas;
    $post->contenido = $request->contenido;
    $post->observaciones = $request->observaciones;
    $post->url = $request->url;
    $post->subir_contenido = $request->subir_contenido;
    $post->codigo_materia = $request->codigo_materia;
    $post->sis_usuario = $request->sis_usuario;
    $post->save();
    //return view('post.index',compact('post'));
    //return redirect()->intended(route('usuario.dashboard'));
    return redirect()->back();
  }
}
}
