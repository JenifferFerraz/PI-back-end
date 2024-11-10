<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registro</title>
    @vite('resources/css/app.css')
    @vite('resources/js/register.js')
</head>
<body class="min-h-screen flex flex-col">

    <main class="min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col bg-purple-950"
            style="background-image: url('{{ asset('bg.svg') }}'); background-size: cover; background-position: center;">
            <header class="flex items-center justify-between px-6 py-4">
                <img class="w-32 h-20" src="{{ asset('Group.svg') }}" alt="logo">
                <a href="{{ route('/') }}"
                    class="text-white border-2 border-white hover:border-purple-950 hover:bg-white hover:text-purple-950 px-4 py-2 rounded-xl">
                    FAÇA LOGIN
                </a>
            </header>
            <section class="flex-grow flex items-center">
                <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto w-full sm:max-w-xl">
                    <div class="w-full bg-white rounded-xl shadow">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight text-purple-950 text-center tracking-tight md:text-2xl">
                                REGISTRE-SE
                            </h1>
                            <form id="registerForm" class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-purple-950">Nome</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Seu Nome" required />
                                    </div>

                                    <div>
                                        <label for="surname" class="block mb-2 text-sm font-medium text-purple-950">Sobrenome</label>
                                        <input type="text" name="surname" id="surname"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Seu Sobrenome" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="data_nascimento" class="block mb-2 text-sm font-medium text-purple-950">Data de Nascimento</label>
                                        <input type="date" name="data_nascimento" id="data_nascimento"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            required />
                                    </div>

                                    <div>
                                        <label for="telefone" class="block mb-2 text-sm font-medium text-purple-950">Telefone</label>
                                        <input type="tel" name="telefone" id="telefone"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="(00) 00000-0000" pattern="\(\d{2}\) \d{5}-\d{4}" required />
                                        <small class="text-gray-500">Exemplo: (11) 98765-4321</small>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-purple-950">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="name@company.com" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="endereco" class="block mb-2 text-sm font-medium text-purple-950">Endereço</label>
                                        <input type="text" name="endereco" id="endereco"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Seu Endereço" required />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4">
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-purple-950">Senha</label>
                                        <input type="password" name="password" id="password"
                                            placeholder="••••••••"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-purple-950 focus:border-purple-950 block w-full p-2.5"
                                            required />
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-purple-950">Confirme sua Senha</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            placeholder="••••••••"
                                            class="bg-gray-200 border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-purple-950 focus:border-purple-950 block w-full p-2.5"
                                            required />
                                    </div>
                                </div>

                                <div class="w-full flex flex-row justify-center">
                                    <button type="submit"
                                        class="w-48 text-white bg-purple-950 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-xl text-sm py-2.5 text-center">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
