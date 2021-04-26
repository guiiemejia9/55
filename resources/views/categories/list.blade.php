@extends('layouts.base')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-10">Lista de categorías</h2>
            <a class="btn btn-success mb-4" href="{{url('/formc')}}">Agregar categoría</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                       <th>Categoria</th>
                        <th>Aciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->namec}}</td>
                        <td>
                            <a href="{{route('editformc',$category->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deletec',$category->id)}}" method="post">
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
            {{$categories->links()}}
        </div>
    </div>
</div>

