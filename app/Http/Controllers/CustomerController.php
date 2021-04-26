<?php

namespace App\Http\Controllers;

use App\Department;
use App\Gender;
use App\Category;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    ///lista
    public function  list(){
        $data['customers']= Customer::paginate(3);

        return view('customers.list',$data);
    }
    //// formulario
    public function  customerform(){
        $categories=Category::all();
        $genders=Gender::all();
        $departments=Department::all();
        return  view('customers.customerform',compact('categories','genders','departments'));
    }
    // guardar
    public function save(Request $request){
        $validator = $this->validate($request,[
            'namecu'=> 'required|string|max:40',
            'nit'=> 'required|string|max:10',
            'daten'=> 'required',
            'age'=> 'required|integer',
            'mail'=> 'required|string|max:40|email|unique:customers',
            'phone'=> 'required|string|max:10',
            'category_id'=> 'required',
            'gender_id'=> 'required',
            'department_id'=> 'required'

        ]);
        $customerdata= request()->except('_token');
        Customer::insert($customerdata);
        return back()->with('guardado', 'cliente guardado');
    }
    // eliminar
    public  function delete($id){
        Customer::destroy($id);

        return back()->with('eliminado','cliente eliminado');
    }


    // formulario para editar
    public  function editform($id){
        $customer = Customer::findOrFail($id);
        $categories=Category::all();;
        $genders=Gender::all();;
        $departments=Department::all();;
        return  view('customers.editform',compact('customer','categories','genders','departments'));

    }

    public function edit(Request $request, $id){
        $validator = $this->validate($request,[
            'namecu'=> 'required|string|max:40',
            'nit'=> 'required|string|max:10',
            'daten'=> 'required',
            'age'=> 'required|integer',
            'phone'=> 'required|string|max:10',
            'category_id'=> 'required',
            'gender_id'=> 'required',
            'department_id'=> 'required'
        ]);
        $customerdata= request()->except('_token', '_method');


        Customer::where('id','=',$id)->update($customerdata);
        return back()->with('modificado', 'cliente modificado');
    }
}
