<?php

namespace App\Http\Requests\Client;

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
            'name' => 'required|string|unique:clients,name,'.$this->route('client')->id.'|max:255',
            'dni'=>'required|string|unique:clients,dni,'.$this->route('client')->id.'|max:11',
            'cif'=>'nullable|string|unique:clients,cif,'.$this->route('client')->id.'|max:9',
            'address'=>'nullable|string',
            'phone'=>'required|string|unique:clients,phone,'.$this->route('client')->id.'|max:9',
            'email'=>'email:rfc,dns|nullable|unique:clients,email,'.$this->route('client')->id.'|max:255'
        ];
    }
}
