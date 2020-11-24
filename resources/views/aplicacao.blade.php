@extends('layouts.app')

@section('conteudo')
    <p>estou aqui</p>
    <p>Usuario: {{ session('usuario') }}</p>
    <a href="/usuario_logout">Logout</a>
@endsection