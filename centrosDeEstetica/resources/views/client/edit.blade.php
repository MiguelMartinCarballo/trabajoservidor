@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">

                <div class="text-center mb-3">
                    <br>
                    <H1> Editar el cliente</H1>
                    <br>
                   
                   

                </div>

                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <div class="row bg-info border border-primary p-5">
                            <div class="col-6">


                                <form method="POST" action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="my-3">
                                        Nombre: <input type="text" class="text-dark border bg-white" name="nombre"
                                            value="{{ $cliente->nombre ?? '' }}">
                                    </div>
                                    <div class="my-3">
                                        Apellido: <input type="text" class=" text-dark border bg-white" name="apellidos"
                                            value="{{ $cliente->apellidos ?? '' }}">
                                    </div>
                                    <div class="my-3">
                                        Telefono: <input type="text" class="text-dark border bg-white" name="direccion"
                                            value="{{ $cliente->direccion ?? '' }}">
                                    </div>
                                    <div class="my-3">
                                        Email: <input type="text" class="text-dark border bg-white" name="email"
                                            value="{{ $cliente->email ?? '' }}">
                                    </div>
                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Elige un Centro</label>
                                    <select class="form-select form-select-md" name="center_id" id="">

                                        @foreach ($centerList as $center)
                                            <option value={{ $center->id }}>{{ $center->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{-- <div class="mb-3">
                                <label for="" class="form-label">Elige un tratamiento</label>
                                <select  class="form-select form-select-lg" name="treatment_id" id="">
                                    <option value="ninguno" selected>Ninguno</option>
                                    @foreach ($tratamientoList as $tratamiento)
                                   
                                    <option value={{$tratamiento->id}}>{{$tratamiento->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div> --}}


                            <button class="btn btn-primary" type="submit" value="actualizar">ACTUALIZAR</button>

                            </form>

                            @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <h6>Por favor corrige los siguientes errores:</h6>
        
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}<br></li>
                                @endforeach
        
                            </div>
                        @endif

                        </div>
                    </div>
                    <div class="col-2"></div>
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
