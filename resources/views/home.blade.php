<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/home.js')
    @vite('resources/js/recommendations.js')
    @vite('resources/js/tecnologias.js')
</head>
<body class="min-h-screen flex flex-col">
    <main class="min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col bg-purple-950" style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center;">
            <header class="flex items-center justify-between px-6 py-4">
                <img class="w-32 h-20" src="{{ asset('Group.svg') }}" alt="logo">
                <div class="flex space-x-2">
                    <button id="editProfileBtn" class="text-white px-4 py-2 border-2 border-white hover:border-purple-950 hover:bg-blue-500 hover:text-purple-950 rounded-xl">Editar Perfil</button>
                    <button id="perguntasBtn" class="text-white px-4 py-2 border-2 border-white hover:border-purple-950 hover:bg-yellow-500 hover:text-purple-950 rounded-xl">Perguntas</button>
                    <button id="logoutBtn" class="text-white px-4 py-2 border-2 border-white hover:border-purple-950 hover:bg-red-500 hover:text-purple-950 rounded-xl">Logout</button>
                </div>
            </header>
            <section class="flex-grow flex items-center">
                <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto w-full sm:max-w-6xl">
                    <div class="w-full bg-white rounded-xl shadow">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight text-purple-950 text-center tracking-tight md:text-2xl">Dashboard</h1>
                            @if(Auth::check())
                                <div class="mt-4 text-center text-purple-950">Bem-vindo, {{ Auth::user()->name }}!</div>
                            @endif
                            <div id="technologyList" class="space-y-4">
                                <h2 class="text-lg font-bold text-purple-950">Lista de Tecnologias</h2>
                                @if($technologies->isEmpty())
                                    <p class="text-center text-gray-600">Nenhuma tecnologia cadastrada.</p>
                                @else
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                                        @foreach($technologies as $technology)
                                            <div class="bg-gray-200 p-6 rounded-xl w-72 border border-purple-950 flex flex-col justify-between h-full">
                                                <h2 class="font-bold text-purple-950 text-center text-lg">{{ $technology->nome }}</h2>
                                                <p class="text-gray-700 text-center text-sm md:text-base">{{ $technology->descricao }}</p>
                                                <p class="text-gray-500 text-center text-sm md:text-base">Nível: {{ $technology->nivel }}</p>
                                                <div class="mt-4 flex justify-center space-x-2">
                                                    <button class="bg-purple-950 text-white px-3 py-1 rounded" onclick="showEditTechnologyForm({{ $technology->id }}, '{{ $technology->nome }}', '{{ $technology->descricao }}', '{{ $technology->nivel }}')">Editar</button>
                                                    <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteTechnology({{ $technology->id }})">Deletar</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div id="editTechnologyForm" class="hidden">
                                <form id="editForm">
                                    <input type="hidden" id="editId" name="id">
                                    <div>
                                        <label for="editNome">Nome:</label>
                                        <input type="text" id="editNome" name="nome" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <div class="mt-4">
                                        <label for="editDescricao">Descrição:</label>
                                        <input type="text" id="editDescricao" name="descricao" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <div class="mt-4">
                                        <label for="editNivel">Nível:</label>
                                        <input type="text" id="editNivel" name="nivel" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Atualizar</button>
                                    <button type="button" class="mt-4 bg-red-500 text-white px-4 py-2 rounded" onclick="hideEditTechnologyForm()">Cancelar</button>
                                </form>
                            </div>
                            <div id="createTechnologyForm" class="hidden">
                                <form id="technologyForm">
                                    <div>
                                        <label for="nome">Nome:</label>
                                        <input type="text" id="nome" name="nome" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <div class="mt-4">
                                        <label for="descricao">Descrição:</label>
                                        <input type="text" id="descricao" name="descricao" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <div class="mt-4">
                                        <label for="nivel">Nível:</label>
                                        <input type="text" id="nivel" name="nivel" required class="w-full px-3 py-2 border rounded">
                                    </div>
                                    <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Cadastrar</button>
                                    <button type="button" class="mt-4 bg-red-500 text-white px-4 py-2 rounded" onclick="hideCreateTechnologyForm()">Cancelar</button>
                                </form>
                            </div>
                            <div class="space-y-4 mt-8">
                                <h2 class="text-lg font-bold text-purple-950">Lista de Recomendações</h2>
                                @if($recommendations->isEmpty())
                                    <p class="text-center text-gray-600">Nenhuma recomendação cadastrada.</p>
                                @else
                                    <ul class="list-none list-inside">
                                        @foreach($recommendations as $recommendation)
                                            <li class="bg-gray-200 p-4 rounded-xl border border-purple-950 mb-2">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h3 class="font-bold text-purple-950">{{ $recommendation->recommendation }}</h3>
                                                      
                                                    </div>
                                                    <div class="flex space-x-2">
                                                      <!--  <button class="bg-purple-950 text-white px-3 py-1 rounded" onclick="showEditRecommendationForm({{ $recommendation->id }}, '{{ $recommendation->recommendation }}', '{{ $recommendation->reason }}')">Editar</button>
                                                        <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRecommendation({{ $recommendation->id }})">Deletar</button>-->
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                          <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded" onclick="showCreateTechnologyForm()">Cadastrar Tecnologia</button>
                          <!--  <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded" onclick="showCreateRecommendationForm()">Cadastrar Recomendação</button>-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>