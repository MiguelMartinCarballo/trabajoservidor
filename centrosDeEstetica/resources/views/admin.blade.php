@extends('layouts.app')

@section('content')

<div class="container">



    <div class="h1 text-center mb-5">
        Bienvenido a la web de gestion
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div
                class="h-100 p-5 text-white bg-info border rounded-3">
                <h2>GERENTE</h2>
                <p>Los gerentes son un tipo de administradores que pueden realizar
                    cualquier acción sobre los socios (crear, eliminar, ver, modificar, etc..).</p>
                <a class="btn btn-outline-light bg-dark text-white"  type="button"  href="{{route('session', 'gerente')}}">Acceder</a>
            </div>
        </div>
        <div class="col-md-6">
            <div
                class="h-100 p-5 bg-success border rounded-3">
                <h2>RECEPCIONISTA</h2>
                <p>Los recepcionistas pueden dar de alta nuevos socios, ver
                    los socios ya creados, y modificar los datos de un socio, pero no puede dar de baja
                    ninguno de ellos. </p>
                <a class="btn btn-outline-light bg-dark text-white" type="button" href="{{route('session','recepcionista')}}">Acceder</a>
            </div>
        </div>
    </div>
</div>



@endsection
