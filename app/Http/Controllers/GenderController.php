<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    ///lista
    public function  list(){
        $data['genders']= Gender::paginate(3);
        return view('genders.list',$data);
    }
    //// formulario
    public function  genderform(){
        return view('genders.genderform');
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'nameg'=> 'required|string|max:40'
        ]);
        $genderdata= request()->except('_token');
        Gender::insert($genderdata);
        return back()->with('guardado', 'genero guardado');
    }
    // eliminar
    public  function delete($id){
        Gender::destroy($id);
        return back()->with('eliminado','genero eliminado');
    }


    // formulario para editar
    public  function editform($id){
        $gender = Gender::findOrFail($id);
        return  view('genders.editform',compact('gender'));
        //   return back()->with('eliminado','categoría eliminada');
    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'nameg'=> 'required|string|max:40'
        ]);
        $genderdata= request()->except('_token', '_method');

        Gender::where('id','=',$id)->update($genderdata);
        return back()->with('modificado', 'genero modificado');
    }
}
