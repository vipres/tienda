<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|unique:products|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sell_price' => 'required',
            'category_id' => 'integer|required',
            'provider_id' => 'integer|required',

        ];
    }

}
