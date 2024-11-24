<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    public function index()
    {
        $questions = Question::with('options')->get();
        return response()->json($questions);
    }

    public function show($id)
    {
        $question = Question::with('options')->findOrFail($id);
        return response()->json($question);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|string',
        ]);

        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|string',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        return response()->json($question);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json(['message' => 'Pergunta deletada com sucesso.']);
    }

    public function getOptions($id)
    {
        $question = Question::findOrFail($id);
        $options = $question->options; 
        return response()->json($options);
    }

    public function storeOption(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|string',
            'next_question_id' => 'nullable|exists:questions,id',
        ]);

        $option = Option::create($request->all());

        return response()->json($option, 201);
    }

    public function updateOption(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|string',
            'next_question_id' => 'nullable|exists:questions,id',
        ]);

        $option = Option::findOrFail($id);
        $option->update($request->all());

        return response()->json($option);
    }

    public function destroyOption($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return response()->json(['message' => 'Opção de resposta deletada com sucesso.']);
    }

    public function submitRespostas(Request $request)
    {
        $respostas = $request->all();

        $recommendations = Recommendation::whereIn('option_id', $respostas)->get();

        return response()->json($recommendations);
    }
}