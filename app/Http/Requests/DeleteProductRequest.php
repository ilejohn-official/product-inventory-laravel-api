<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
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
    * Parse the ids to associative array before validating.
    *
    * @return void
    */
    protected function prepareForValidation()
    {
        $this->merge([
            'ids' => json_decode($this->ids, true),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'required|numeric|min:1',
        ];
    }
}
