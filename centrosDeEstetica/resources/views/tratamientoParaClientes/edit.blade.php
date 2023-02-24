@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-5 justify-content-center align-items-center g-2 text-center">

            <div class="col-6">

                <br>
               <h3> Añadir Tratamiento al cliente</h3>
                <h3> {{ $tratamientoParaCliente->nombre }}, {{ $tratamientoParaCliente->apellidos }} con ID: {{ $tratamientoParaCliente->id }}</h3>
                <br>
            </div>

        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-5">
                <table class="table table-striped table-hover" border="1">
                    <tr class="bg-info">
                        <td>TRATAMIENTO</td>
                        <td>DESCRIPCION</td>
                        <td>PRECIO</td>
                    </tr>
                    @foreach ($tratamientoList as $pedidos)
                        <tr>
                            <td>{{ $pedidos->Nombre }}</td>
                            <td>{{ $pedidos->Descripcion }}</td>
                            <td>{{ $pedidos->Precio }} $</td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="col-1"></div>
            <div class="col-5 p-5 border border-info bg-info  border rounded">


                <form method="POST"
                    action="{{ route('tratamientoParaClientes.update', ['tratamientoParaCliente' => $tratamientoParaCliente->id]) }}">
                    @csrf
                    @method('PUT')

                    

                    <div class="mb-3">
                        <label for="" class="form-label">Elige un tratamiento</label>
                        <select class="form-select form-select-md" name="treatment_id" id="">
                            <option value="ninguno" selected>Ninguno</option>
                            @foreach ($tratamientoList as $tratamiento)
                                <option value={{ $tratamiento->id }}>{{ $tratamiento->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                        <button class="btn btn-lg w-100 btn-primary float-end" type="submit" value="actualizar">Añadir</button>
                    
                  

                   
                    

                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6>Por favor corrige los siguientes errores:</h6>

                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}<br></li>
                        @endforeach

                    </div>
                @endif
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
