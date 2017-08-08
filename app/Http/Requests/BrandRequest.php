<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'=>'required|min:4|max:20',
        ];
    }
    
    public function messages(){
        return [
             'name.required' => 'Please Enter Brand Name',
             'name.min'=>'Brand Name has at least 8 characters',
             'name.max'=>'Brand Name has less than 20 characters'  
    ];
}
}
