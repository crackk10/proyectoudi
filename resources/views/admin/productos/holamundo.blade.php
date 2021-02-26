@extends("theme.$theme.layout")
@section('contenido')
@php
auth()->user()->tipo_usuario;   
@endphp
 
@endsection
