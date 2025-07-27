<?php

namespace App\Http\Requests\Transacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalvarTransacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data' => ['required', 'date'],
            'tipo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:255'],
            'valor' => ['required', 'numeric'],
            'categoria' => ['nullable', 'string', 'max:255'],
            'repeticao' => ['nullable', 'boolean'],
            'fixo' => ['nullable', 'boolean'],
            'user_id' => ['required', Rule::exists('users', 'id')],
        ];
    }
}
