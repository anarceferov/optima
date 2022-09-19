<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::post('employees/import', [EmployeeController::class, 'import']);
Route::resource('employees', EmployeeController::class);

