<?php

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    ///lista de usuarios
     public function  list(){
         $data['categories']= Category::paginate(3);
         return view('categories.list',$data);
     }

    // fin
    //// formulario
    public function  categoryform(){
        return view('categories.categoryform');
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'namec'=> 'required|string|max:40'
        ]);
        $categorydata= request()->except('_token');
        Category::insert($categorydata);
        return back()->with('guardado', 'categoría guardada');
    }
    // eliminar
    public  function delete($id){
         Category::destroy($id);

          return back()->with('eliminado','categoría eliminada');
    }


    // formulario para editar categoria
    public  function editform($id){
         $category = Category::findOrFail($id);
         return  view('categories.editform',compact('category'));
     //   return back()->with('eliminado','categoría eliminada');
    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'namec'=> 'required|string|max:40'
        ]);
        $categorydata= request()->except('_token', '_method');

        Category::where('id','=',$id)->update($categorydata);
        return back()->with('modificado', 'categoría modificada');
    }


}
