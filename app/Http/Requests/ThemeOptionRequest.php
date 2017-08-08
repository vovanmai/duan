<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeOptionRequest extends FormRequest
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
             'picture'=>'required'
              'link'=>'required'
        ];
    }
    public function messages(){
        return [
             'title.required' => 'Please Enter Product Title',
             'desc.required' => 'Please Enter Product Description',
             'picture.required' => 'Please Enter Picture',
             'link.required' => 'Please Enter Link',
          
    ];
    }
}
