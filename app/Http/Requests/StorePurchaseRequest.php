<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:0',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $product = Product::find($this->product);

            if (!$product) {
                return $validator->errors()->add('product_id', 'Product not found.');
            }

            if ($this->qty > $product->quantity_available) {
                return $validator->errors()->add('qty', 'Insufficient stock available.');
            }
        });
    }
}
