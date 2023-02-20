




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
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                        <td><a href="{{route('tratamientoParaClientes.edit',$cliente->id)}}" class="btn btn-primary">add</a></td>
                        <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Editar</a></td>
                        <td><a href="{{route('clientes.show',$cliente->id)}}"class="btn btn-primary">Ver</a></td>
    
                        @if(session('admin')=="gerente")
                        <td>
                            <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                
                            <button type="submit" class="btn btn-primary">Borrar</button>
                            </form>
                        </td>  
                        @else
                        @endif
                    </tr>
    
    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    @endsection







