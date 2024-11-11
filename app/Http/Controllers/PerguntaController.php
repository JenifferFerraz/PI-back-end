<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class PerguntaController extends Controller

  {
    public function index()
    {
        // Retorna todas as perguntas com suas opções de resposta
        $questions = Question::with('options')->get();
        return response()->json($questions);

        
    }

    public function show($id)
    {
        // Retorna uma pergunta específica com suas opções de resposta
        $question = Question::with('options')->findOrFail($id);
        return response()->json($question);
    }

    public function store(Request $request)
    {
        // Validação das perguntas
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|string',
        ]);

        // Cria uma nova pergunta
        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|string',
        ]);

        // Atualiza a pergunta
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return response()->json($question);
    }

    public function destroy($id)
    {
        // Deleta uma pergunta
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['message' => 'Pergunta deletada com sucesso.']);
    }

    // Método para retornar as opções de resposta de uma pergunta
    public function getOptions($id)
    {
        $question = Question::findOrFail($id);
        $options = $question->options;  // Relacionamento com a model Option
        return response()->json($options);
    }

    // Método para criar uma opção de resposta
    public function storeOption(Request $request)
    {
        // Validação
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|string',
        ]);

        // Cria a opção de resposta
        $option = Option::create($request->all());

        return response()->json($option, 201);
    }

    // Método para atualizar uma opção de resposta
    public function updateOption(Request $request, $id)
    {
        // Validação
        $request->validate([
            'answer' => 'required|string',
        ]);

        // Atualiza a opção de resposta
        $option = Option::findOrFail($id);
        $option->update($request->all());

        return response()->json($option);
    }

    // Método para deletar uma opção de resposta
    public function destroyOption($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return response()->json(['message' => 'Opção de resposta deletada com sucesso.']);
    }
}

