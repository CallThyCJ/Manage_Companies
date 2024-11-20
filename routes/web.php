<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $companies = Company::all();
    return view('welcome', compact('companies'));
});


