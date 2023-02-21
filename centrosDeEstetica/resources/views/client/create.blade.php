@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">




                <div class="text-center">
                    <br>
                    <H1> Añadir un cliente</H1>
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
                <div class="col-5">

                    <div class="row bg-info border border-primary p-4">

                        <div class="col-5">
                            <form class="form"method="post" action="{{ route('clientes.store') }}">
                                @csrf


                                <div class="my-3  form-outline">
                                    Nombre: <input class=" border bg-white" type="text" name="nombre">
                                </div>
                                <div class="my-3">
                                    Apellido: <input class=" border bg-white" type="text" name="apellidos">
                                </div>
                                <div class="my-3">
                                    Direccion: <input class="border bg-white" type="text" name="direccion">
                                </div>
                                <div class="my-3">
                                    Email: <input class="border bg-white" type="text" name="email">
                                </div>

                        </div>
                        <div class="col-6">
                            <br>
                            <div class="mb-3">
                                <label for="" class="form-label">Elige un Centro</label>
                                <select class="form-select form-select-md" name="center_id" id="">

                                    @foreach ($centerList as $center)
                                        <option value={{ $center->id }}>{{ $center->Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-5">
                                <label for="" class="form-label">Elige un tratamiento</label>
                                <select class="form-select form-select-md" name="treatment_id" id="">
                                    <option value="ninguno" selected>Ninguno</option>
                                    @foreach ($tratamientoList as $tratamiento)
                                        <option value={{ $tratamiento->id }}>{{ $tratamiento->Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>








                        </div>
                        <div class="row justify-content-center align-items-center g-2">

                            <button class="btn btn-large btn-primary text-center mt-5 " type="submit"
                                value="actualizar">AÑADIR</button>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h6>Por favor corrige los siguientes errores:</h6>

                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}<br></li>
                                    @endforeach

                                </div>
                            @endif

                        </div>



                        </form>
                        <br>

                    </div>


                </div>
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
