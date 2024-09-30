<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permitir que qualquer usuário faça essa requisição
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',  
            'descricao' => 'required|string', 
            'nivel' => 'required|string', 
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'numeric' => 'O campo :attribute deve ser um número.',
            'max' => 'O campo :attribute não pode ter mais que :max caracteres.',
        ];
    }
}
