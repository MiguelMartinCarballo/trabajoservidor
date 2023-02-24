




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
    
        <h5 class="float-end">Cuenta: <b >{{session('admin')}}</b></h5> 
    



          @if(!empty($peluqueria[0]))
            <h3>Peluquería</h3>
            <p>Nombre:{{$centro[0]->Nombre}} <br>
            direccion: {{$centro[0]->Direccion}} <br>
            CIF:  {{$centro[0]->CIF}} <br>
            capacidad máxima:  {{ $peluqueria[0]->capacidadMaxima}} <br>
            unisex: @if ($peluqueria[0]->unisex==1) 
            si @else no @endif</p> 
         
            @else

            <h3>Centro de estética</h3>

            <p>Nombre: {{$centro[0]->Nombre}} <br>
                direccion: {{$centro[0]->Direccion}} <br>
                 CIF:  {{$centro[0]->CIF}} <br>
                 número de salas:  {{ $estetica[0]->numeroSalas}} <br>
                 fisioterapia: @if($estetica[0]->fisioterapia==1 ) si @else no @endif</p> 

            @endif
                <br>
                <h3 class="mb-4">Lista clientes</h3>
                <a class="btn btn-primary bg-primary"href="{{route('clientes.create')}}">Nuevo cliente</a>
                <br>
                <br>
    
                <table class="table table-striped table-hover" border="1">


                    <tr class="bg-info">
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Direccion</td>
                    <td>Email</td>
                
                    <td></td>
                    <td></td>
                    <td></td>
                    @if(session('admin')=="gerente")
                    <td></td>
                    @endif
               
                </tr>
                    @foreach($clienteList as $cliente)
                    <tr >
                       
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellidos}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->email}}</td>
                        {{-- <td>{{$cliente->center->Nombre}}</td> --}}
                        <td><a href="{{route('tratamientoParaClientes.edit',$cliente->id)}}" class="btn btn-primary bg-primary">añadir tratamiento</a></td>
                        <td><a href="{{route('clientes.show',$cliente->id)}}"class="btn btn-primary bg-success">Ver</a></td>
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
    
    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
    @endsection







