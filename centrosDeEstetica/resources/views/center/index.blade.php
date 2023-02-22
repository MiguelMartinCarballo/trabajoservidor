@extends('layouts.app')

@section('content')


<div class=" m-1 mb-5 row align-items-md-stretch">

@foreach($centro as $key=>$centro)

@if($key%4==0)
</div>
<div class="m-1 mb-5 row align-items-md-stretch">

@endif
    <div class="col-md-3">
        <div
            class=" p-5  h-100 text-white bg-info border rounded-3" >
            <h3>{{$centro->Nombre}} </h3>
            <p></p>
            <a class="btn btn-outline-light bg-dark text-white"  type="button"  href="{{route('session2', $centro->id)}}">Acceder</a>
        </div>
    </div>




   
  @endforeach
</div>
@endsection