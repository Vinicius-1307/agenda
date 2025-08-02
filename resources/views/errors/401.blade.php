@extends('layouts.app')

@section('title', 'Não Autenticado')

@section('content')
    <div class="text-center mt-20">
        <h1 class="text-5xl font-bold text-yellow-500">401</h1>
        <p class="text-xl mt-4">Você precisa estar logado para acessar esta página.</p>
        <a href="{{ route('login') }}" class="text-blue-500 underline mt-6 inline-block">Ir para login</a>
    </div>
@endsection
