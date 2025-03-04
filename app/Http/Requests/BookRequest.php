<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Si se retorna true, se permite la solicitud.
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
            // Asegúrate de excluir el propio ISBN del libro cuando se hace la actualización
            'ISBN' => 'required|size:13|unique:books,ISBN,' . $this->route('book')->id,
            'title' => 'required|min:1',
            'author' => 'required|min:1',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ISBN.required' => 'The ISBN is required.',
            'ISBN.size' => 'The ISBN must be exactly 13 characters.',
            'ISBN.unique' => 'The ISBN has already been taken.',
            'title.required' => 'The title is required.',
            'author.required' => 'The author is required.',
            'stock.required' => 'The stock quantity is required.',
            'stock.numeric' => 'The stock quantity must be a number.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',
        ];
    }
}
