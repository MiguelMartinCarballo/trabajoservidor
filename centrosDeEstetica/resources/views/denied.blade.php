@extends('layouts.app')
@section('content')

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">ACCESO DENEGADO</h1>
      <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      <a class="btn btn-primary btn-lg" href="{{route('salir')}}" type="button">ir al Inicio</a>
     
    </div>
  </div>
  @endsection

