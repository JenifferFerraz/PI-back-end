<?php

namespace App\Http\Controllers;

use App\Interface\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        try {
            $user = $this->authService->login($request->all());
            return response()->json([
                'status' => 200,
                'message' => "Usuário logado com sucesso",
                'usuario' => $user,
                'user_id' => $user->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
