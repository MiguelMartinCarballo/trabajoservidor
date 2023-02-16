@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <h2>CLIENTE {{$cliente->id}}</h2>
            <a href="{{route('clientes.create')}}">Nuevo cliente</a>

            <table class="table table-striped table-hover" border="1">
               
                <tr>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->email}}</td>
                    <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Editar</a></td>
                 
                    <td>
                        <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            
                        <button type="submit" class="btn btn-primary">Borrar</button>
                        </form>
                    </td>
                </tr>
            </table>

            <div>
                <h2>TRATAMIENTOS QUE SE HA HECHO EL CLIENTE</h2>

                @if(empty($cliente->orders[0]))
                <br>
                <p>No hay tramientos por parte de este cliente</p>
                @else
                <table class="table table-striped table-hover" border="1">
                    <tr>
                        <td>SOLICITANTE</td>
                            <td>FECHA</td>
                            <td>DESCRIPCION</td>
                    </tr>
                @foreach($cliente->orders as $pedidos)

               <tr>
                   <td>{{$pedidos->solicitante}}</td>
                   <td>{{$pedidos->fecha}}</td>
                   <td>{{$pedidos->descripcion}}</td>
            
               </tr>
               @endforeach
           </table>
           @endif
            </div>
        </div>
    </div>
</div>

@endsection