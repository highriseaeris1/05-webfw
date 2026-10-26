<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// validasi kategori dipindah dari controller ke form request
class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ];
    }
}
