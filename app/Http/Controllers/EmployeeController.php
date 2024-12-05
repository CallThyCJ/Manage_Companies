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

    public function update(Request $request, $id){

        $inputCompanyText = $request->input('editEmployeeCompany');

//        validation
        try {
            $request->validate([
                "editEmployeeFirstName" => "required|string|max:30",
                "editEmployeeLastName" => "required|string|max:30",
                "editEmployeeEmail" => "nullable|string|email|max:80",
                "editEmployeePhoneNumber" => "nullable|regex:/^[0-9]{10,15}$/|max:15",
                "editEmployeeCompany" => "required|string|max:100",
            ]);

            $companyExists= Company::where('company_name', $inputCompanyText)->first();

            if (!$companyExists) {
                return redirect()->back()->withErrors([
                    'editEmployeeCompany' => 'The company does not exist in our records.',
                ])->withInput();
            }

        } catch (ValidationException $e) {
            Log::info('Validation Errors:', $e->errors());
            return redirect()->back()->withErrors($e->errors());
        }

//        Find the employee
        $employee = Employee::findOrFail($id);

//        check which information has changed
        $changes = [];
        if ($request->input("editEmployeeFirstName") !== $employee->first_name) {
            $changes["first_name"] = $request->input("editEmployeeFirstName");
        }

        if ($request->input("editEmployeeLastName") !== $employee->last_name) {
            $changes["last_name"] = $request->input("editEmployeeLastName");
        }

        if ($request->input("editEmployeeEmail") !== $employee->email) {
            $changes["employee_email"] = $request->input("editEmployeeEmail");
        }

        if ($request->input("editEmployeePhoneNumber") !== $employee->phone_number) {
            $changes["employee_phone_number"] = $request->input("editEmployeePhoneNumber");
        }

        if ($companyExists->id !== $employee->company_id) {
            $changes["company_id"] = $companyExists->id;
        }

        // If there are no changes, return without updating
        if (empty($changes)) {
            return redirect()->back()->with("message", "No changes detected.");
        } else {
            // Update the employee details with changes
            $employee->update($changes);
        }

        return redirect('/employees/' . $employee->id)->with('message', 'Employee updated successfully!');
    }

    public function destroy($id) {
        $employee = Employee::find($id);

//        check if the employee actually exists
        if (!$employee) {
            return redirect("/employees")->with('error', 'Employee not found.');
        }

        $employee->delete();

        return redirect("/employees")->with('message', 'Employee deleted successfully!');
    }

    public function index(request $request) {
        $search = $request->input("search");

        $employees = Employee::query()->when($search, function ($query) use ($search) {
            return $query->where('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%');
        })->get();

        return view('/employees', compact('employees', 'search'));
    }
}
