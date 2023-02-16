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