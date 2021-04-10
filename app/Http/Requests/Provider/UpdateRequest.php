<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:providers,email,
            '.$this->route('provider')->id,
            'cif' => 'required|string|max:10|min:09|unique:providers,cif,
            '.$this->route('provider')->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:9|min:9|unique:providers,phone,
            '.$this->route('provider')->id,
        ];
    }
}
