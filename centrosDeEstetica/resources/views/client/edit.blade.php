@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <H1>     EDITAR clientes</H1>
            <br>
            <td><a class="btn btn-warning" href="{{route('clientes.index')}}">clientes</a></td>
            <td><a class="btn btn-primary" href="{{route('clientes.show',$cliente->id)}}">Ver</a></td>
       
                    <form method="POST" action="{{ route('clientes.update',['cliente'=>$cliente->id]) }}">
                        @csrf
                        @method("PUT")
                      
                        <div class="my-3">
                        Nombre: <input  type="text"  name="nombre" value="{{ $cliente->nombre ?? '' }}" >
                        </div>
                        <div class="my-3">
                        Apellido: <input  type="text"  name="apellidos" value="{{ $cliente->apellidos ?? '' }}" >
                        </div>
                        <div class="my-3">
                        Telefono: <input  type="text"  name="direccion" value="{{ $cliente->direccion?? '' }}" >
                        </div>
                        <div class="my-3">
                        Email: <input  type="text"  name="email" value="{{ $cliente->email ?? '' }}" >
                        </div>
                        <div class="my-3">
                            numero de centro: <input  type="text"  name="center_id" value="{{ $cliente->center_id ?? '' }}" >
                            </div>
                       
                        
                        

                        <button class="btn btn-primary" type="submit" value="actualizar">ACTUALIZAR</button>
                   
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
