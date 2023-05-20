<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product.category_id' => 'required|string|max:2|min:1',
            'product.name' => 'required|string|max:50',
            'product.quantity' => 'required|string|max:500',
        ];
    }
}
