@extends('layouts.app')

@section('title', 'Erro interno')

@section('content')
    <div class="text-center mt-20">
        <h1 class="text-5xl font-bold text-red-700">500</h1>
        <p class="text-xl mt-4">Ocorreu um erro interno. Tente novamente mais tarde.</p>
        <a href="{{ url('/') }}" class="text-blue-500 underline mt-6 inline-block">Ir para página inicial</a>
    </div>
@endsection
