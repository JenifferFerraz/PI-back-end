<?php

namespace App\Interface;

interface AuthServiceInterface
{
    public function login(array $credentials);
    public function logout();
}
