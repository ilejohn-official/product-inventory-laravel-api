<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sku' => 'required|string|unique:products|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'attributeValue' => 'required|array',
            'attributeValue.*' => 'required|numeric|min:0.01',
            'productType_unit' => 'required|in:CM,KG,MB',
            'productType_key' => 'required|in:Size,Weight,Dimension'
        ];
    }
}
