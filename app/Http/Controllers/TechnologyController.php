<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyCreateRequest;
use App\Services\TechnologyService;
use Illuminate\Http\JsonResponse;

class TechnologyController extends Controller
{
    protected $technologyService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;
    }

    /**
     * Exibe todas as tecnologias.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $technologies = $this->technologyService->index();
        return view('home', compact('technologies'));
    }

    /**
     * Cria uma nova tecnologia.
     *
     * @param \App\Http\Requests\TechnologyCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TechnologyCreateRequest $request): JsonResponse
    {
        $technology = $this->technologyService->store($request->validated());
        return response()->json([
            'status' => 201,
            'message' => 'Tecnologia cadastrada com sucesso!',
            'tecnologia' => $technology
        ], 201);
    }

    /**
     * Exibe a tecnologia com o ID especificado.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $technology = $this->technologyService->show($id);
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia encontrada com sucesso!',
            'tecnologia' => $technology
        ]);
    }

    /**
     * Atualiza a tecnologia com o ID especificado.
     *
     * @param \App\Http\Requests\TechnologyCreateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TechnologyCreateRequest $request, $id): JsonResponse
    {
        $technology = $this->technologyService->update($request->validated(), $id);
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia atualizada com sucesso!',
            'tecnologia' => $technology
        ]);
    }

    /**
     * Deleta a tecnologia com o ID especificado.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->technologyService->destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia deletada com sucesso!'
        ], 204);
    }
}
