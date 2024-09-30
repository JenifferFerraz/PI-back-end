<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home - Lista de Tecnologias</title>
    @vite('resources/css/app.css')
    @vite('resources/js/home.js')
</head>
<body class="min-h-screen flex flex-col">

    <main class="min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col bg-purple-950"
            style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center;">
            <header class="flex items-center justify-between px-6 py-4">
                <img class="w-32 h-20" src="{{ asset('Group.svg') }}" alt="logo">
            </header>
            <section class="flex-grow flex items-center">
                <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto w-full sm:max-w-4xl">
                    <div class="w-full bg-white rounded-xl shadow">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight text-purple-950 text-center tracking-tight md:text-2xl">
                                Lista de Tecnologias
                            </h1>
                            <div class="space-y-4">
                                @if($technologies->isEmpty())
                                    <p class="text-center text-gray-600">Nenhuma tecnologia cadastrada.</p>
                                @else
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6">
                                        @foreach($technologies as $technology)
                                            <div class="bg-gray-200 p-10 rounded-xl border border-purple-950 flex flex-col justify-between h-full">
                                                <h2 class="font-bold text-purple-950 text-center text-lg">{{ $technology->nome }}</h2>
                                                <p class="text-gray-700 text-center text-sm md:text-base">{{ $technology->descricao }}</p>
                                                <p class="text-gray-500 text-center text-sm md:text-base">Nível: {{ $technology->nivel }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
