<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'category' => 'required',
            //in this sector remember to add photo validation
            'county' => 'required',
            'subCounty' => 'required',
            'productTitle' => 'required',
            'productFor' => 'required',
            'description' => 'required',
            'price' => 'required | integer',
            'negotiable' => 'required',
            'phoneNumber' => 'required | integer',
            'plan' => 'required',
            'terms' => 'required'
        ];
    }
}
