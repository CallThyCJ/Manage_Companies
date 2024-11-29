<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $companies = Company::simplePaginate(8);
    return view('welcome', compact('companies'));
});

Route::get('/company', function () {

    return view('company');
});

Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

Route::get("/employees", function () {
    $employeesWithLogo = Employee::fetchWithCompanyLogo()->simplePaginate(30);
    $companies = Company::all();

    return view('employees', compact('employeesWithLogo', 'companies'));
});

Route::get('/register', function () {

    return view('auth.register');
});

Route::post("/register", [UserController::class, "store"])->name('user.store');

Route::get("/{id}", function ($id) {
    $company = Company::findOrFail($id);


    return view('company', ["company" => $company]);
});

Route::get("/{id}/edit", function ($id) {
    $company = Company::findOrFail($id);


    return view('/edit_company', ['company' => $company]);
});

Route::put('/{id}/edit', [CompanyController::class, 'update'])->name('company.update');

Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

route::get("/employees/{id}", function ($id) {
    $employee = Employee::find($id);
    $companyID = $employee->company_id;
    $company = Company::find($companyID);


    return view('employee', ["employee" => $employee], compact('company'));
});

route::get("/employees/{id}/edit", function ($id) {
    $employee = Employee::findOrFail($id);
    $companyID = $employee->company_id;
    $company = Company::find($companyID);


    return view('/edit_employee', ['employee' => $employee, 'company' => $company,]);
});

Route::get('/add_new_employee', function () {

    return view('add_new_employee');
});

Route::post('/add_new_employee', [EmployeeController::class, 'store'])->name('employee.store');

Route::put('/employees/{id}/edit', [EmployeeController::class, 'update'])->name('employees.update');

Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
