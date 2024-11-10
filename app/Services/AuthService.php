<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Interface\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }

        throw new \Exception("Credenciais inválidas.");
    }

    public function logout()
    {
        Auth::logout();
    }
}
