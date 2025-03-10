<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'name' => 'required|string|max:200',
            'slug' => 'required|string|max:200',
            'description' => 'required',
            'yt_iframe' => 'nullable',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'meta_status' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
