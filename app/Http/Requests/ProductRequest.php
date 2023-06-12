<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest

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
            'product.category_id' => 'required|max:2|min:1',
            'product.product_code' => 'required|unique:products,product_code|max:10000000000',
            'product.company' => 'nullable',
            'product.name' => 'required|string|max:50',
            'product.unit_price' =>'required|max:1000000',
            'product.quantity' => 'required|max:10000000',
        ];
    }
}
