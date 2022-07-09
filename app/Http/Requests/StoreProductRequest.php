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
     * Parse the Atrribute Value to associative array before validating.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'attributeValue' => json_decode($this->attributeValue, true),
        ]);
    }

    /**
     * Get array of attribute value keys
     *
     * @return array
     */
    protected function attributeValue()
    {
        return array_keys($this->toArray()['attributeValue']);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'attributeValue.height' => $this->attributeValue()[0],
            'attributeValue.width' => array_key_exists(1, $this->attributeValue()) ? $this->attributeValue()[1] : '',
            'attributeValue.lenght' => array_key_exists(2, $this->attributeValue()) ? $this->attributeValue()[2] : '',
            'attributeValue.weight' => $this->attributeValue()[0],
            'attributeValue.size' => $this->attributeValue()[0],
        ];
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
