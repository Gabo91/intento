<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\Plataforma;
use Auth;
use Session;
use Redirect;

class PlataformaController extends Controller
{
    public function index(){
        $plataformas = Plataforma::paginate(4);
        return view('registrarDepartamento.index',compact('plataformas'));
      }
  
      public function addPlataforma(Request $request){
        $rules = array(
          'nombre_plataforma' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails()){
        Session::flash('message0','Error al registrar la herramienta');
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      }else {
        $plataformas = new Plataforma();
        $plataformas->nombre_plataforma = $request->nombre_plataforma;
        $plataformas->save();
        Session::flash('message','Plataforma creada con exito');
        //return response()->json($plataformas);
        return redirect()->back();
    
      }
  }
  
  public function editPlataforma(request $request){
    $plataformas = Plataforma::find ($request->id);
    $plataformas->nombre_plataforma = $request->nombre_plataforma;
    $plataformas->save();
    return response()->json($plataformas);
  }
  
  public function deletePlataforma(request $request){
    $departamentos = Plataforma::find ($request->id)->delete();
    return response()->json();
  }
}
