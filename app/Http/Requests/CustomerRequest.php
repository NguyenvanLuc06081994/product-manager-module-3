<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:2|max:30',
            'phone'=>'required|numeric|max:99999999999',
            'email'=>'required|unique:customers,email|min:10|max:255',
            'address'=>'required|min:2|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'We need to know your full name!',
            'name.min' => 'Name size must be between 2 and 30!',
            'name.max' => 'Name size must be between 2 and 30!',
            'phone.required' => 'We need to know your phone!',
            'phone.numeric' => 'phone under validation must be numeric',
            'phone.max' => 'phone must be on 11 characters!',
            'email.required' => 'We need to know your email!',
            'email.max' => 'your email is too long!',
            'address.required' => 'We need to know your address!',
            'address.min' => 'Address size must be between 2 add 255',
            'address.max' => 'Address size must be between 2 add 255'
        ];
    }
}
