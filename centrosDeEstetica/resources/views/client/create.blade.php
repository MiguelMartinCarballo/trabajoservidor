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