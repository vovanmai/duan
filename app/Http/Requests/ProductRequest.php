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
             'name'=>'required',
             'price'=>'required|numeric',
             'discount'=>'required|numeric|min:0|max:100',
             'brand'=>'required',
             'category'=>'required',
        
             'preview'=>'required',
             'detail'=>'required',
        ];
    }
    public function messages(){
        return [
             'name.required' => 'Please Enter Product Name',
             'price.required' => 'Please Enter Product Price',
             'price.numeric' => 'Please Enter A Number',
            
             'discount.required' => 'Please Enter Product Discount',
             'brand.required' => 'Please Enter Product Brand',
             'category.required' => 'Please Enter Product Category',
            
             'detail.required' => 'Please Enter Product Detail',
    ];
    }
}
