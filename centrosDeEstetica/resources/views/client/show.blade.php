@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <h2>{{$cliente->nombre}} {{$cliente->apellidos}} </h2>
            {{-- <a href="{{route('clientes.create')}}">Nuevo cliente</a> --}}
                <br>

            
            
            {{-- <p> </p>
            <p> </p>


     
            @if(!empty($peluqueria[0]))
            <h3>Peluquería</h3>
            <p>{{$centro->Nombre}}, direccion: {{$centro->Direccion}}, CIF:  {{$centro->CIF}} capacidad máxima:  {{ $peluqueria[0]->capacidadMaxima}} unisex: @if ($peluqueria[0]->unisex==1) si @else no @endif</p> 
         
            @else

            <h3>Centro de estética</h3>
            <p>{{$centro->Nombre}}, direccion: {{$centro->Direccion}}, CIF:  {{$centro->CIF}} número de salas:  {{ $estetica[0]->numeroSalas}} fisioterapia: @if($estetica[0]->fisioterapia==1 ) si @else no @endif</p> 
          
           
            
      
            @endif --}}
            <table class="table table-striped table-hover" border="1">
                <tr class="bg-info">
                    <td>NOMBRE</td>
                        <td>APELLIDOS</td>
                        <td>DIRECCION</td>
                        <td>EMAIL</td>
                        <td>Numero de centro</td>
                        <td>gestionar</td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellidos}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->center_id}}</td>
                    <td><a href="{{route('tratamientoParaClientes.edit',$cliente->id)}}" class="btn btn-primary bg-primary">añadir tratamiento</a></td>
                    <td><a href="{{route('clientes.edit',$cliente->id)}}" class="btn btn-primary bg-warning">Editar</a></td>
                    @if(session('admin')=="gerente")
                    <td>
                        <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            
                        <button type="submit" class="btn btn-primary bg-danger">Borrar</button>
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
                    <tr class="bg-info">
                        <td>TRATAMIENTO</td>
                            <td>DESCRIPCION</td>
                            <td>PRECIO</td>
                    </tr>
                @foreach($cliente->treatments as $pedidos)

               <tr>
                   <td>{{$pedidos->Nombre}}</td>
                   <td>{{$pedidos->Descripcion}}</td>
                   <td>{{$pedidos->Precio}} €</td>
               </tr>
               @endforeach

               <tr style="background-color: rgba(0, 0, 0, 0.066) ">
                <td></td>
                <td >Suma total </td>
                <td >{{$suma}} €</td>
               </tr>
           </table>
           @endif
            </div>
        </div>
    </div>
</div>



<div class="row justify-content-center align-items-center g-2 fixed-bottom">
    <div class="col-11"></div>
    <div class="col-1">
        <a class="mt-5 btn btn-secondary " href="{{ route('clientes.index') }}">Volver al inicio</a>
    </div>
    <div class=""></div>
</div>
@endsection