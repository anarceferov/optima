<?php

namespace App\Imports;

use App\Models\Employee;
use App\Traits\ApiResponder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;


class EmployeesImport implements ToModel, WithUpserts, WithChunkReading, WithBatchInserts, ShouldQueue
{

    use Importable , ApiResponder;

    public function model(array $row)
    {
        return new Employee([
            'full_name' => $row[0] ?? null,
            'fin_code' => Str::upper($row[1]) ?? null,
            'email' => $row[2] ?? null,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'email';
    }


//    public function rules(): array
//    {
//        return [
//            'full_name' => 'required',
//            'email' => 'required|email|unique:employees',
//            'fin_code' => 'required|min:7|max:7'
//        ];
//    }
//
//
//    public function customValidationMessages():array
//    {
//        return [
//            'email.required' => 'Email mutleqdir',
//            'email.email' => 'Email duzgun formartda deyil',
//            'email.unique' => 'Email movcutdur',
//            'fin_code.required' => 'Fin Code mutleqdir',
//            'full_name.required' => 'Full Name mutleqdir',
//            'fin_code.digits' => 'Fin Code 7 simvol olmalidir',
//        ];
//    }
}
