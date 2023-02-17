@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <H1> AÑADIR clientes</H1>
            <br>
            <td><a class="btn btn-warning" href="{{route('clientes.index')}}">clientes</a></td>

            <form method="post" action="{{ route('clientes.store') }}">
                @csrf

                        <div class="my-3">
                        Nombre: <input  type="text"  name="nombre"  >
                        </div>
                        <div class="my-3">
                        Apellido: <input  type="text"  name="apellidos"  >
                        </div>
                        <div class="my-3">
                        Direccion: <input  type="text"  name="direccion"  >
                        </div>
                        <div class="my-3">
                        Email: <input  type="text"  name="email"  >
                        </div>
                      
                        <div class="mb-3">
                            <label for="" class="form-label">Elige un Centro</label>
                            <select  class="form-select form-select-lg" name="center_id" id="">
                          
                                @foreach($centerList as $center)
                               
                                <option value={{$center->id}}>{{$center->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                     
                <div class="mb-3">
                    <label for="" class="form-label">Elige un tratamiento</label>
                    <select  class="form-select form-select-lg" name="treatment_id" id="">
                        <option value="ninguno" selected>Ninguno</option>
                        @foreach($tratamientoList as $tratamiento)
                       
                        <option value={{$tratamiento->id}}>{{$tratamiento->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
    
                <button class="btn btn-primary" type="submit" value="actualizar">AÑADIR</button>

            </form>
            @if($errors->any())

            <div class="alert alert-danger">
                <h6>Por favor corrige los siguientes errores:</h6>

                @foreach($errors->all() as $error)
                <li> {{$error}}<br></li>
                @endforeach

            </div>
            @endif
           
        </div>
    </div>
</div>

@endsection