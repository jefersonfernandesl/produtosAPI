<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateProductFormRequest extends FormRequest
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
            'code' => 'required|unique:products,code',
            'name' => 'required|min:3|max:255',
            'description' => 'max:255',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'O código é obrigatório',
            'code.unique' => 'Já existe um produto com esse código',
            'name.required' => 'O nome do produto é obrigatório',
            'name.min' => 'O nome precisa ter pelo menos 3 caracteres',
            'name.max' => 'O nome só pode ter no máximo 255 caracteres',
            'price.required' => 'O valor é obrigatório',
            'price.numeric' => 'Insira um valor válido'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422));
    }
}
