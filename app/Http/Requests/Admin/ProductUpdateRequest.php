<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image','max:3048'],
            'name' => ['required','string','max:255'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'offer' => ['nullable','numeric'],
            'short_description' => ['required','string','max:500'],
            'long_description' => ['required','string'],
            'sku' => ['required','max:255'],
            'seo_title' => ['required','max:255'],
            'seo_description' => ['required','max:255'],
            'show_at_home' => ['boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
}
