<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAddressRequest extends FormRequest
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
            'region'    =>  'required',
            'name'      =>  'required',
            'phone'     =>  'required|numeric',
            'address'   =>  'required',
            'zip'       =>  'numeric|required'
        ];
    }
}
