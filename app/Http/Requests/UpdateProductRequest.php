<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'quantity' => 'required|string', // Quantity as string per PDF
            'price' => 'required|numeric|between:0,99999999.99', // Max 10 digits total
            'category_id' => 'required|exists:categories,id', // Must exist in categories table
            'user_id' => 'sometimes|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Nama produk harus berupa string.',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',

            'quantity.integer' => 'Jumlah produk harus berupa angka bulat.',

            'price.numeric' => 'Harga produk harus berupa angka yang valid.',
            
            'user_id.exists' => 'Owner yang dipilih tidak valid.',
        ];
    }
}
