<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    ///lista
    public function  list(){
        $data['departments']= Department::paginate(3);
        return view('departments.list',$data);
    }
    //// formulario
    public function  departmentform(){
        return view('departments.departmentform');
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'named'=> 'required|string|max:40'
        ]);
        $departmentdata= request()->except('_token');
        Department::insert($departmentdata);
        return back()->with('guardado', 'departamento guardado');
    }
    // eliminar
    public  function delete($id){
        Department::destroy($id);
        return back()->with('eliminado','departamento eliminado');
    }


    // formulario para editar
    public  function editform($id){
        $department = Department::findOrFail($id);
        return  view('departments.editform',compact('department'));

    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'named'=> 'required|string|max:40'
        ]);
        $departmentdata= request()->except('_token', '_method');

        Department::where('id','=',$id)->update($departmentdata);
        return back()->with('modificado', 'departamento modificado');
    }
}
