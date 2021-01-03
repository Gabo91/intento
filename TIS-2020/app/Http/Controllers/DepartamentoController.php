<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class DepartamentoController extends Controller
{
    public function index(){
        $departamentos = Departamento::paginate(4);
        return view('registrarDepartamento.index',compact('departamentos'));
      }
  
      public function addDepartamento(Request $request){
        $rules = array(
          'departamento' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  
      else {
        $departamentos = new Departamento();
        $departamentos->departamento = $request->departamento;
        $departamentos->id_facultad = $request->id_facultad;
        $departamentos->save();
        //return response()->json($departamentos);
        return redirect()->back();
      }
  }
  
  public function editDepartamento(request $request){
    $departamentos = Departamento::find ($request->id);
    $departamentos->facultad = $request->facultad;
    $departamentos->save();
    return response()->json($departamentos);
  }
  
  public function deleteDepartamento(request $request){
    $departamentos = Departamento::find ($request->id)->delete();
    return response()->json();
  }
}
