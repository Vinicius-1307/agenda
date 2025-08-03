<x-app-layout>
    <div class="text-center mt-20">
        <h1 class="text-6xl font-bold text-red-600">403</h1>
        <p class="text-xl mt-4 text-gray-800 dark:text-gray-200">Você não tem permissão para acessar esta página.</p>
        <a href="{{ url()->previous() }}" class="mt-6 inline-block text-blue-600 hover:underline">Voltar</a>
    </div>
</x-app-layout>
