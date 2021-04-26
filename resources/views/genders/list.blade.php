@extends('layouts.base')
<br>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Lista de generos</h2>
            <a class="btn btn-success mb-4" href="{{url('/formg')}}">Agregar generos</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Género</th>
                    <th>Aciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genders as $gender)
                    <tr>
                        <td>{{$gender->nameg}}</td>
                        <td>
                            <a href="{{route('editformg',$gender->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deleteg',$gender->id)}}" method="post">
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
            {{$genders->links()}}
        </div>
    </div>
</div>


