<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'slug'         => 'required|string|unique:products',
            'price'        => 'required|numeric|min:0|max:999999999.99',
            'description'  => 'required|string',
            'thumbnail'    => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',

            'product_images'   => 'nullable|array',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',

        ];
    }
    
}
