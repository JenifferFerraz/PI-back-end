<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Perguntas</title>
    @vite('resources/css/app.css')
    @vite('resources/js/perguntas.js')
</head>
<body class="flex flex-col h-full bg-purple-950 p-10" style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center;">

    <div class="min-h-screen flex flex-col" id="introArea">
        <div class="flex w-full items-center mb-8">
            <div class="relative w-72 h-72">
                <img
                    src="{{ asset('Group 1.svg') }}" 
                    alt="Atena"
                    class="w-full h-full object-contain animate-bounce"
                />
            </div>
            <div class="w-2/3 h-full bg-gray-200 p-4 border shadow-lg flex flex-col justify-between rounded-lg">
                <p class="text-purple-950 text-xl">
                    Olá, eu sou Atena! Para te ajudar a escolher o banco de dados que
                    melhor atende às suas necessidades, vou fazer algumas perguntas.
                    Isso nos permitirá identificar as opções mais adequadas ao seu
                    projeto.
                </p>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <button id="startBtn" class="px-6 py-3 bg-gray-200 w-20 shadow-md md:w-80 h-16 hover:bg-purple-600 text-xl hover:text-white transition duration-300 ease-in-out font-montserrat-alternates hover:border-white border rounded-lg">
                CONTINUAR
            </button>
        </div>
    </div>

    <div class=" min-h-screen flex flex-col hidden" id="questionsArea">
        <div class="flex w-full items-center mb-8">
            <div class="relative w-72 h-72">
                <img src="{{ asset('Group 1.svg') }}" alt="Atena" class="w-full h-full object-contain animate-bounce"/>
            </div>
            <form id="perguntasForm" class="w-2/3 h-full bg-gray-200 p-4 border shadow-lg flex flex-col justify-between rounded-lg">
                <div id="perguntasContainer" class="mb-6 w-full">
                </div>
                </div>
            </form>
            <div class="flex justify-center items-center">
            <button type="submit" id="continuarBtn" class="px-6 py-3 bg-gray-200 w-20 shadow-md md:w-80 h-16 hover:bg-purple-600 text-xl hover:text-white transition duration-300 ease-in-out font-montserrat-alternates hover:border-white border rounded-lg">
                CONTINUAR
            </button>
        </div>
        </div>
    </div>

    </body>
</html>
