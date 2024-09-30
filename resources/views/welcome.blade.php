<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/js/login.js')
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="min-h-screen flex flex-col ">
    <main class="min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col bg-purple-950" style="background-image: url('bg.svg'); background-size: cover; background-position: center;">
            <header class="flex items-center justify-between px-6 py-4">
                <img class="w-32 h-20" src="Group.svg" alt="logo">
                <a href="{{ route('register') }}" class="text-white border-2 border-white hover:border-purple-950 hover:bg-white hover:text-purple-950 px-4 py-2 rounded-xl">CADASTRE-SE</a>
            </header>
            <section class="flex-grow flex items-center ">
                <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto w-full sm:max-w-md">
                    <div class="w-full bg-white rounded-xl shadow">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight text-purple-950 text-center tracking-tight md:text-2xl">FAÇA SEU LOGIN</h1>
                            <form id="loginForm" action="{{ route('user.login') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-purple-950">Email</label>
                                    <input type="email" name="email" id="email" class="bg-gray-base border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required>
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-purple-950">Senha</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-base border border-purple-950 text-gray-900 sm:text-sm rounded-xl focus:ring-purple-950 focus:border-purple-950 block w-full p-2.5" required>
                                </div>
                                <div class="flex items-center justify-between pt-4">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-purple-950 rounded-xl bg-gray-base focus:ring-3 focus:ring-purple-950">
                                        </div>
                                        <div class="ml-3 text-sm ">
                                            <label for="remember" class="text-purple-950">Lembrar senha</label>
                                        </div>
                                    </div>
                                    <a href="#" class="text-sm font-medium text-purple-light hover:underline ">Esqueceu a senha?</a>
                                </div>
                                <div class="w-full flex flex-row justify-center pt-4">
                                    <button type="submit" class="w-48 text-white bg-purple-950 hover:bg-primary-700 focus:outline-none font-medium rounded-xl text-sm py-2.5 text-center hover:bg-purple-light">Login</button>
                                </div>
                            </form>
                            @if(session('message'))
                                <div class="mt-4 text-center text-red-600">{{ session('message') }}</div>
                            @endif
                        </div>
                        <div class="my-4 mx-4">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-gray-100 text-purple-950">Ou continue com</span>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-3 gap-3">
                                <div class="flex justify-center">
                                    <a href="#" id="facebook-btn" class="flex items-center justify-center px-6 py-3 border border-purple-950 rounded-xl shadow-sm text-sm font-medium text-purple-950 bg-white hover:bg-gray-50">
                                        <img class="h-5 w-5" src="https://www.svgrepo.com/show/512120/facebook-176.svg" alt="Facebook">
                                    </a>
                                </div>
                                <div class="flex justify-center">
                                    <a href="#" id="twitter-btn" class="flex items-center justify-center px-6 py-3 border border-purple-950 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        <img class="h-5 w-5" src="https://www.svgrepo.com/show/513008/twitter-154.svg" alt="Twitter">
                                    </a>
                                </div>
                                <div class="flex justify-center">
                                    <a href="#" id="google-btn" class="flex items-center justify-center px-6 py-3 border border-purple-950 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        <img class="h-6 w-6" src="https://www.svgrepo.com/show/506498/google.svg" alt="Google">
                                    </a>
                                </div>
                            </div>
                            @if(session('loading'))
                                <div class="mt-4 text-center text-purple-950">Loading...</div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>