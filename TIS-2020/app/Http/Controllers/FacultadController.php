<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultad;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class FacultadController extends Controller
{
    public function index(){
     
      $products = Facultad::orderBy('id', 'ASC')->paginate();
        return view('auth/registrarUnidades', compact('products'));
     
      }
  
      public function addFacultad(Request $request){
        $rules = array(
          'facultad' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
  
      else {
        $facultads = new Facultad;
        $facultads->facultad = $request->facultad;
        $facultads->save();
        return redirect()->back();
      }
  }
  
  public function editFacultad(request $request){
    $facultads = Facultad::find ($request->id);
    $facultads->facultad = $request->facultad;
    $facultads->save();
    return response()->json($facultads);
  }
  
  public function deleteFacultad(request $request){
    $facultads = Facultad::find ($request->id)->delete();
    return response()->json();
  }
}
