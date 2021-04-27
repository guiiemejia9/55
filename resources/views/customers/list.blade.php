@extends('layouts.base')
<br>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Lista de clientes</h2>
            <a class="btn btn-success mb-4" href="{{url('/formcu')}}">Agregar cliente</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="m-2">NIT</th>
                    <th>Fecha nacimiento</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Categoria</th>
                    <th>Género</th>
                    <th>Departamento</th>
                    <th>Aciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->namecu}}</td>
                        <td>{{$customer->nit}}</td>
                        <td>{{$customer->daten}}</td>
                        <td>{{$customer->age}}</td>
                        <td>{{$customer->mail}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->category->namec}}</td>
                        <td>{{$customer->gender->nameg}}</td>
                        <td>{{$customer->department->named}}</td>
                        <td>
                            <a href="{{route('editformcu',$customer->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deletecu',$customer->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('borrar?');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$customers->links()}}
        </div>
    </div>
</div>



