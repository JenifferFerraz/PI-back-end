<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return response()->json([
            'status' => 200,
            'message' => 'Usuários encontrados!',
            'users' => $users,
        ]);
    }
    public function store(Request $request)
    {
        $user = $this->userService->store($request->all());
        return response()->json(['status' => 200, 'message' => 'Registro bem-sucedido']);
    }
    public function show($id)
    {
        $user = $this->userService->show($id);
        return response()->json([
            'status' => 200,
            'message' => 'Usuário encontrado!',
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($request, $id);
        return response()->json([
            'status' => 200,
            'message' => 'Usuário atualizado com sucesso!',
            'user' => $user,
        ]);
    }

    public function destroy($id)
    {
        $user = $this->userService->destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Usuário deletado com sucesso!',
        ]);
    }
}
