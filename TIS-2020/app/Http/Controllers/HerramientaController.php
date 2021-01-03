<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use App\Herramienta;
use Auth;
use Session;
use Redirect;

class HerramientaController extends Controller
{
    public function index(){
        $herramientas = Herramienta::paginate(4);
        return view('registrarDepartamento.index',compact('herramientas'));
      }
  
      public function addHerramienta(Request $request){
        $rules = array(
          'nombre_herramienta' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails()){
        Session::flash('message0','Error al crear la herramienta');
        return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
      }else {
        $herramientas = new Herramienta();
        $herramientas->nombre_herramienta = $request->nombre_herramienta;
        $herramientas->save();
        //return response()->json($herramientas);
        Session::flash('message','Herramienta creada con exito');
        return redirect()->back();
      }
  }
  
  public function editHerramienta(request $request){
    $herramientas = Herramienta::find ($request->id);
    $herramientas->nombre_herramienta = $request->nombre_herramienta;
    $herramientas->save();
    return response()->json($herramientas);
  }
  
  public function deleteHerramienta(request $request){
    $herramientas = Herramienta::find ($request->id)->delete();
    return response()->json();
  }
}
