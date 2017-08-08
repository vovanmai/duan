<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeOptionEdit extends FormRequest
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
             'title'=>'required',
             'desc'=>'required',
             'link'=>'required'
        ];
    }
    public function messages(){
        return [
             'title.required' => 'Please Enter Product Title',
             'desc.required' => 'Please Enter Product Description',
             'link.required' => 'Please Enter Link',
             
            
          
    ];
    }
}
