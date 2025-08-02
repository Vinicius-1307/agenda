@extends('layouts.app')

@section('title', 'Página não encontrada')

@section('content')
    <div class="text-center mt-20">
        <h1 class="text-5xl font-bold text-gray-600">404</h1>
        <p class="text-xl mt-4">A página que você está procurando não existe.</p>
        <a href="{{ url('/') }}" class="text-blue-500 underline mt-6 inline-block">Ir para página inicial</a>
    </div>
@endsection
