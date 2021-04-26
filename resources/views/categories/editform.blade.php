@extends('layouts.base')
<br>
<div class="container mt-5">
    <div class=" row justify-content-center">
        <div class="col-md-7 mt-5">

            <!-- mesajes de confirmacion -->
            @if(session('modificado'))
                <div class="alert alert-success">
                    {{session('modificado')}}
                </div>
            @endif

        <!-- errores de validaciones -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors-> all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach

                    </ul>
                </div>
        @endif
        <!--fin error -->
            <div class="card">
                <form action="{{route('editc',$category->id)}}" method="post">
                    @csrf @method('PATCH')
                    <div class="card-header text-center">
                        Modificar Categoría
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-5">Nombre de la categoría</label>
                            <input type="text" name="namec" class="form-control col-md-9" value="{{$category->namec}}">

                        </div>
                        <br>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-5 offset-4">Modificar</button>
                        </div>
                    </div>

                </form>

            </div>
            <a class="btn btn-light btn-xs mt-5" href="{{url('/listc')}}">Lista de categorias</a>
        </div>
    </div>
</div>
