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
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'product_image' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'please Choose The Category',
            'product_name.required' => 'please enter product Name',
            'description.required' => 'please enter description',
            'product_image.required' => 'please Choose image',
            'price.required' => 'please enter the price',
        ];
    }
}
