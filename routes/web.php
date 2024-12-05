<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $search = $request->input('search');

    $companies = Company::withCount('employees')
        ->when($search, function ($query, $search) {
            return $query->where('company_name', 'like', "%{$search}%");
        })
        ->simplePaginate(8);

    return view('welcome', compact('companies', 'search'));
})->name("Companies");

Route::get('/company', function () {

    return view('company');
});

Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

route::get('/list_new_company', function () {

    return view('/list_new_company');
});

Route::get("/employees", function (Request $request) {
    $search = $request->input('search');

    $employeesWithLogo = Employee::fetchWithCompanyLogo()->when($search, function ($query, $search) {
        return $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', '%' . $search . '%');
    })
    ->simplePaginate(30);
    $companies = Company::all();

    return view('employees', compact('employeesWithLogo', 'companies'));
})->name("Employees");

Route::get('/register', function () {

    return view('auth.register');
})->name('register');

Route::post("/register", [UserController::class, "store"])->name('user.store');

Route::get('/login', function () {

    return view('auth.login');
})->name('login');

Route::post("/login", [UserController::class, "login"])->name('user.login');

Route::post("/logout", [UserController::class, "logout"])->name('user.logout');

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
