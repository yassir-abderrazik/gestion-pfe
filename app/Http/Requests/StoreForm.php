<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForm extends FormRequest
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
            'firstname' => 'required|min:2|max:50',
            'lastname' => 'required|min:2|max:50',
            'CIN' => 'required',//|regex:/[A-Z]{1,2}[0-9]{6}/|max:10|min:4
            'CNE' => 'required', //|regex:/[A-Z][0-9]{9}/|max:10|min:10

            'birthday' => 'required|date',
            'city' => 'required|min:2|max:50',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required|min:2|max:255',
            'faculty' => 'required|min:2|max:50',
            'specialty' => 'required|min:2|max:200',
            'supervisor' => 'required',
            'project' => 'required|min:2|max:200',
            'summary' => 'required',
        ];
    }
    public function messages(){
        return [
            'CIN.regex' =>  'CIN Format is invalid ex : AA123456 ou A12345 ...',
            'CNE.regex' =>  'CNE Format is invalid ex : G123456789 ',
            'birthday.date' =>  'birthday must be Date',
            'email.email' =>  'enter a valid email',
            'phone.regex' =>  'Phone Format is invalid ex : 0612345678',
        ];
    }
}
