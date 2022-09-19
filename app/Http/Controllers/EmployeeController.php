<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    use ApiResponder;

    public function index()
    {
        $employees = Employee::get();

        return $this->dataResponse($employees);
    }


    public function store(StoreEmployeeRequest $request)
    {

        $employee = new Employee();
        $employee->fill($request->only([
            'full_name',
            'fin_code',
            'email'
        ]));
        $employee->save();

        return $this->dataResponse(['employee_id' => $employee->id], 201);
    }


    public function show($id)
    {

        $employee = Employee::findOrFail($id);

        return $this->dataResponse($employee);
    }


    public function update(UpdateEmployeeRequest $request, $id)
    {

        $employee = Employee::findOrFail($id);

        $employee->fill($request->only([
            'full_name',
            'fin_code',
            'email'
        ]));
        $employee->save();

        return $this->successResponse(trans('responses.ok'));
    }


    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return $this->successResponse(trans("responses.ok"));
    }



    public function import(ImportEmployeeRequest $request)
    {

        Excel::queueImport(new EmployeesImport, $request->file('employee_excel'));

        return $this->successResponse(trans('responses.ok'));
    }

}
