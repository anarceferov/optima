<?php

namespace App\Imports;

use App\Models\Employee;
use App\Notifications\ImportHasFailedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Events\ImportFailed;



class EmployeesImport implements ToModel, WithUpserts, WithChunkReading, WithBatchInserts, ShouldQueue
{

//    public function __construct(Employee $importedBy)
//    {
//        $this->importedBy = $importedBy;
//    }
//
//    public function registerEvents(): array
//    {
//        return [
//            ImportFailed::class => function (ImportFailed $event) {
//                $this->importedBy->notify(new ImportHasFailedNotification);
//            },
//        ];
//    }

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

}
