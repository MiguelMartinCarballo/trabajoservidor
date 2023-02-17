


@if(session('admin'))

@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
    
            @if (session('exito'))
        <div class="alert alert-success">
            {{ session('exito') }}
        </div>
        @endif
    
        <h4>session: {{session('admin')}}</h4> 
    
                <br>
                Lista clientes
                <a href="{{route('clientes.create')}}">Nuevo cliente</a>
    
                <table class="table table-striped table-hover" border="1">
                    @foreach($clienteList as $cliente)
                    <tr>
                       
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellidos}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->center_id}}</td>
                        
                        <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Editar</a></td>
                        <td><a href="{{route('clientes.show',$cliente->id)}}"class="btn btn-primary">Ver</a></td>
    
    
                        <td>
                            <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                
                            <button type="submit" class="btn btn-primary">Borrar</button>
                            </form>
                    </tr>
    
    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    @endsection
@else

    @section('content')

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">ACCESO DENEGADO</h1>
      <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      <a class="btn btn-primary btn-lg" href="{{route('salir')}}" type="button">ir al Inicio</a>
     
    </div>
  </div>
  @endsection
@endif




