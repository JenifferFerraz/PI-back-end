<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyCreateRequest;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('home', ['technologies' => $technologies]);

        return response()->json([
          'status' => 200,
            'tecnologias' => $technologies
        ]);
    }

    public function store(TechnologyCreateRequest $request)
    {
        $technology = Technology::create($request->validated());
        return response()->json([
            'status' => 201,
            'message' => 'Tecnologia cadastrada com sucesso!',
            'tecnologia' => $technology
        ], 201);
    }

    public function show($id)
    {
        $technology = Technology::findOrFail($id);
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia encontrada com sucesso!',
            'tecnologia' => $technology
        ]);
    }

    public function update(TechnologyCreateRequest $request, $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia atualizada com sucesso!',
            'tecnologia' => $technology
        ]);
    }

    public function destroy($id)
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Tecnologia deletada com sucesso!'
        ], 204);
    }
}