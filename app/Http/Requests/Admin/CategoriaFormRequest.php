<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:200',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'required|string',
            'meta_keyword' => 'required|string',
            'meta_status' => 'nullable',
            'status' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'image.max' => 'A imagem não pode ter mais de 2 MB. Escolha uma imagem menor.',
        ];
    }
}
