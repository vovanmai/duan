<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'username' =>'required|min:4|max:20',
            'name' => 'required',
            'password'=> 'max:20|confirmed',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required',
            'avatar' => 'nullable|mimes:jpeg,gif,png,jpg|max:2000'
        ];
    }
}
