<?php

namespace App\Http\Requests\Client;

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
            'name'=>'required|string',
            'dni'=>'required|string|unique:clients|max:11',
            'cif'=>'nullable|string|unique:clients',
            'address'=>'nullable|string',
            'phone'=>'string|unique:clients|max:9',
            'email'=>'email:rfc,dns|nullable|unique:clients|max:255'
        ];
    }
}
