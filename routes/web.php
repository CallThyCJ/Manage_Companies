<?php

use App\Http\Controllers\CompanyController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $companies = Company::all();
    return view('welcome', compact('companies'));
});

Route::get('/list_new_company', function () {

    return view('list_new_company');
});

Route::post('/list_new_company', [CompanyController::class, 'store'])->name('company.store');
