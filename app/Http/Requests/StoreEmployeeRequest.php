<?php

namespace App\Http\Requests;

use http\Env\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'email' => 'required|email|unique:employees',
            'full_name' => 'required',
            'fin_code' => 'required|min:7|max:7'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Email mutleqdir',
            'email.email' => 'Email duzgun formartda deyil',
            'email.unique' => 'Email movcutdur',
            'fin_code.required' => 'Fin Code mutleqdir',
            'full_name.required' => 'Full Name mutleqdir',
            'fin_code.digits' => 'Fin Code 7 simvol olmalidir',
        ];
    }


}
