<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportEmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }


//    public function rules()
//    {
//        return [
//            'employee_excel' => 'mimes:application/a2l'
//        ];
//    }
//
//    public function messages()
//    {
//        return [
//            'employee_excel.mimes'=>'Fayl xlsx formatinda olmalidir'
//        ];
//    }

}
