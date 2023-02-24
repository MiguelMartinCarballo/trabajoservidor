@extends('layouts.app')
@section('content')
<div class="container">
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">ACCESO DENEGADO</h1>
      <p class="col-md-8 fs-4">No has accedido en calidad ni de recepcionista ni de gerente por lo cual no tienes acceso a ello</p>
      <a class="btn btn-primary btn-lg" href="{{route('salir')}}" type="button">ir al Inicio</a>
     
    </div>
  </div>
</div>

  @endsection

