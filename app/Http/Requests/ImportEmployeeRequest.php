<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportEmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'excel' => 'mimes:application/a2l'
        ];
    }

    public function messages()
    {
        return [

        ];
    }

}
