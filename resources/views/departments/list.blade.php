@extends('layouts.base')
<br>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Lista de departamentos</h2>
            <a class="btn btn-success mb-4" href="{{url('/formd')}}">Agregar departamento</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Aciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{$department->named}}</td>
                        <td>
                            <a href="{{route('editformd',$department->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deleted',$department->id)}}" method="post">
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
            {{$departments->links()}}
        </div>
    </div>
</div>


