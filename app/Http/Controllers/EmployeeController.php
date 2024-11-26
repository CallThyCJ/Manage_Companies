<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function store(Request $request){

        $inputCompanyText = $request->input('employeeCompany');



        try {
            // Validate the input
            $request->validate([
                "employeeFirstName" => "required|string|max:30",
                "employeeLastName" => "required|string|max:30",
                "employeeEmail" => "nullable|string|email|max:80",
                "employeePhoneNumber" => "nullable|regex:/^[0-9]{10,15}$/|max:15",
                "employeeCompany" => "required|string|max:100",
            ]);

            $companyExists= Company::where('company_name', $inputCompanyText)->first();

            if (!$companyExists) {
                return redirect()->back()->withErrors([
                    'employeeCompany' => 'The company does not exist in our records.',
                ])->withInput();
            }

        } catch (ValidationException $e) {
            // Output the validation errors
            Log::info('Validation Errors:', $e->errors()); // Log errors instead of dd
            return redirect()->back()->withErrors($e->errors());
        }



        Employee::create([
            "first_name" => $request->input("employeeFirstName"),
            "last_name" => $request->input("employeeLastName"),
            "employee_email" => $request->input("employeeEmail"),
            "employee_phone_number" => $request->input("employeePhoneNumber"),
            "company_id" => $companyExists->id,
        ]);

        return redirect("/employees")->with("message", "Employee has been added");
    }
}
