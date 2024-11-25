<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Perfil</title>
    @vite('resources/css/app.css')
    @vite('resources/js/profile.js')
</head>
<body class="min-h-screen flex flex-col">
    <main class="min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col bg-purple-950" style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center;">
            <header class="flex items-center justify-between px-6 py-4">
                <img class="w-32 h-20" src="{{ asset('Group.svg') }}" alt="logo">
                <div class="flex space-x-2">
                    <button id="logoutBtn" class="text-white px-4 py-2 border-2 border-white hover:border-purple-950 hover:bg-red-500 hover:text-purple-950 rounded-xl">Logout</button>
                    <button onclick="window.location.href='/home'" class="text-white px-4 py-2 border-2 border-white hover:border-purple-950 hover:bg-blue-500 hover:text-purple-950 rounded-xl">Voltar</button>
                </div>
            </header>
            <section class="flex-grow flex items-center">
                <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto w-full sm:max-w-6xl">
                    <div class="w-full bg-white rounded-xl shadow">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight text-purple-950 text-center tracking-tight md:text-2xl">Editar Perfil</h1>
                            <form id="profileForm">
                                <input type="hidden" id="editId" name="id" value="{{ $user->id }}">
                                <div>
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" required class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="surname">Sobrenome:</label>
                                    <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}" required class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="data_nascimento">Data de Nascimento:</label>
                                    <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $user->data_nascimento }}" required class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone" value="{{ $user->telefone }}" class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="endereco">Endereço:</label>
                                    <input type="text" id="endereco" name="endereco" value="{{ $user->endereco }}" class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="password">Senha:</label>
                                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded">
                                </div>
                                <div class="mt-4">
                                    <label for="password_confirmation">Confirmação de Senha:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded">
                                </div>
                                <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>