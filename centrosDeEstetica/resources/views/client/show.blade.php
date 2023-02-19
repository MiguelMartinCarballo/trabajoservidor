@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <h2>CLIENTE {{$cliente->id}}</h2>
            <a href="{{route('clientes.create')}}">Nuevo cliente</a>
            <p>{{$centro->Nombre}} </p>
            <p>{{$centro->Direccion}} </p>
            <p>{{$centro->CIF}} </p>
            <p>{{$tipo}} </p>
            <table class="table table-striped table-hover" border="1">
                <tr>
                    <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>DIRECCION</td>
                        <td>EMAIL</td>
                        <td>Numero de centro</td>
                        <td>gestionar</td>
                </tr>
                <tr>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->center_id}}</td>
                    <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Editar</a></td>
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
            </table>

            <div>
                <h2>TRATAMIENTOS QUE SE HA HECHO EL CLIENTE</h2>

                @if(empty($cliente->treatments[0]))
                <br>
                <p>No hay tramientos por parte de este cliente</p>
                @else
                <table class="table table-striped table-hover" border="1">
                    <tr>
                        <td>TRATAMIENTO</td>
                            <td>DESCRIPCION</td>
                            <td>PRECIO</td>
                    </tr>
                @foreach($cliente->treatments as $pedidos)

               <tr>
                   <td>{{$pedidos->Nombre}}</td>
                   <td>{{$pedidos->Descripcion}}</td>
                   <td>{{$pedidos->Precio}} $</td>
               </tr>
               @endforeach

               <tr>
                <td></td>
                <td>Suma total </td>
                <td>{{$suma}} $</td>
               </tr>
           </table>
           @endif
            </div>
        </div>
    </div>
</div>

@endsection