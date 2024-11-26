<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $companies = Company::all();
    return view('welcome', compact('companies'));
});

Route::get('/list_new_company', function () {

    return view('list_new_company');
});

Route::post('/list_new_company', [CompanyController::class, 'store'])->name('company.store');

Route::get("/employees", function () {
    $employeesWithLogo = Employee::fetchWithCompanyLogo();
    $companies = Company::all();

    return view('/employees', compact('employeesWithLogo', 'companies'));
});

route::get("/employees/{id}", function ($id) {
    $employee = Employee::find($id);
    $companyID = $employee->company_id;
    $company = Company::find($companyID);


    return view('employee', ["employee" => $employee], compact('company'));
});

Route::get('/add_new_employee', function () {

    return view('add_new_employee');
});

Route::post('/add_new_employee', [EmployeeController::class, 'store'])->name('employee.store');
