<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required|string|unique:products',
            'image' => 'required|url',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'title.required' => 'The title is required.',
            'title.max' => 'The title may not exceed 255 characters.',
            'description.required' => 'The description is required.',
            'code.required' => 'The code is required.',
            'code.unique' => 'The code must be unique.',
            'image.required' => 'The image URL is required.',
            'image.url' => 'The image must be a valid URL.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
        ];
    }
}
