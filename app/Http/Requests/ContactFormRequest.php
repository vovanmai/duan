<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'contact_name'=>'required|min:4|max:20',
            'contact_name'=>'nullable|min:10|max:20',
            'contact_name'=>'required|email',
            'contact_name'=>'required|min:4|max:20',
            'contact_name'=>'required|min:10|max:250'
        ];
    }
}
