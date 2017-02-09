@extends('examples.layout')

@section('content')
<h1>Ejemplo de Uso de Vistas</h1>
<p>
    @if (isset($user))
        Bienvenido {{ $user }}
    @else
        Bienvenido usuario anónimo
        <!-- Mostramos el formulario de login -->
    @endif
</p>
@endsection

@section('title')
    Curso de Laravel 5 en DWES
@endsection