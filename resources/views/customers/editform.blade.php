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
                <form action="{{route('editcu',$customer->id)}}" method="post">
                    @csrf @method('PATCH')
                    <div class="card-header text-center">
                        Modificar cliente
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-5">Nombre</label>
                            <input type="text" name="namecu" class="form-control col-md-9" value="{{$customer->namecu}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">NIT</label>
                            <input type="text" name="nit" class="form-control col-md-9" value="{{$customer->nit}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Fecha de nacimiento</label>
                            <input type="date" name="daten" class="form-control col-md-9" value="{{$customer->daten}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Edad</label>
                            <input type="number" name="age" class="form-control col-md-9" value="{{$customer->age}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Email</label>
                            <input type="email" name="mail" class="form-control col-md-9" value="{{$customer->mail}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Teléfono</label>
                            <input type="tel" name="phone" class="form-control col-md-9" value="{{$customer->phone}}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Categoría</label>
                            <select class="form-control col-md-9" name="category_id">
                                    <option value="{{$customer->category_id}}" selected disabled>{{$customer->category->namec}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->namec}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Género</label>
                            <select class="form-control col-md-9" name="gender_id">
                                <option value="{{$customer->gender_id}}" selected disabled>{{$customer->gender->nameg}}</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->nameg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-5">Departamento</label>
                            <select class="form-control col-md-9" name="department_id">
                                <option value="{{$customer->department_id}}" selected disabled>{{$customer->department->named}}</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->named}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-5 offset-4">Modificar</button>
                        </div>
                    </div>

                </form>

            </div>
            <a class="btn btn-light btn-xs mt-5" href="{{url('/listcu')}}">Lista de clientes</a>
        </div>
    </div>
</div>



