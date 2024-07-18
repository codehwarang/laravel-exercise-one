<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function messages()
    {
        return [
            'sku.unique' => 'Product with this SKU is already exists'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sku' => ['required', 'string', 'unique:products,sku'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'thumbnail_image' => ['required', 'image'],
            'additional_images' => ['nullable', 'array'],
            'additional_images.*' => ['image']
        ];
    }
}
