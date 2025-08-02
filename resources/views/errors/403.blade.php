@extends('layouts.app')

@section('title', 'Acesso Negado')

@section('content')
    <div class="text-center mt-20">
        <h1 class="text-5xl font-bold text-red-600">403</h1>
        <p class="text-xl mt-4">Você não tem permissão para acessar esta página.</p>
        <a href="{{ url()->previous() }}" class="text-blue-500 underline mt-6 inline-block">Voltar</a>
    </div>
@endsection
