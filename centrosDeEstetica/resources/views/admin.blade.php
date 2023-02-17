@extends('layouts.app')

@section('content')

<div class="container">



    <div class="h1 text-center mb-5">
        Bienvenido a la web de gestion
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div
                class="h-100 p-5 text-white bg-danger border rounded-3">
                <h2>GERENTE</h2>
                <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then,
                    mix and match with additional component themes and more.</p>
                <a class="btn btn-outline-light bg-dark"  type="button"  href="{{route('session', 'gerente')}}">Acceder</a>
            </div>
        </div>
        <div class="col-md-6">
            <div
                class="h-100 p-5 bg-warning border rounded-3">
                <h2>RECEPCIONISTA</h2>
                <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure
                    to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both
                    column's content for equal-height.</p>
                <a class="btn btn-outline-light bg-dark" type="button" href="{{route('session','recepcionista')}}">Acceder</a>
            </div>
        </div>
    </div>
</div>



@endsection
