@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <br>
            <h1>Añadir Tratamiento al cliente {{$tratamientoParaCliente->nombre}},{{$tratamientoParaCliente->apellidos}} con ID: {{$tratamientoParaCliente->id}}</h1>
            <br>
       
       
                    <form method="POST" action="{{ route('tratamientoParaClientes.update',['tratamientoParaCliente'=>$tratamientoParaCliente->id]) }}">
                        @csrf
                        @method("PUT")
                      
                            <h1>{{$tratamientoParaCliente->id}}</h1>
                     
                         <div class="mb-3">
                            <label for="" class="form-label">Elige un tratamiento</label>
                            <select  class="form-select form-select-lg" name="treatment_id" id="">
                                <option value="ninguno" selected>Ninguno</option>
                                @foreach($tratamientoList as $tratamiento)
                               
                                <option value={{$tratamiento->id}}>{{$tratamiento->Nombre}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <button class="btn btn-primary" type="submit" value="actualizar">Añadir</button>
                   
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
