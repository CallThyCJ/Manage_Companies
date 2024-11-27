<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    //

    public function store(Request $request){

        // Automatically add 'https://' if the companyWebsite doesn't have it
        $companyWebsite = $request->input('companyWebsite');

        if (!empty($companyWebsite) && !preg_match("~^(?:f|ht)tps?://~i", $companyWebsite)) {
            $companyWebsite = 'https://' . $companyWebsite;
        }

        try {
            // Validate the input
            $request->validate([
                "companyName" => "required|string|max:100",
                "companyEmail" => "required|string|email|max:60",
                $companyWebsite => "nullable|string|url|max:80",
                "companyLogo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ]);
        } catch (ValidationException $e) {
            // Output the validation errors
            Log::info('Validation Errors:', $e->errors()); // Log errors instead of dd
            return redirect()->back()->withErrors($e->errors());
        }

        if($request->hasFile("companyLogo")){
            $logopath = $request->file("companyLogo")->store("company_logos", "public");

            $logopathUrl = asset('storage/' . $logopath);
        } else {
            $logopathUrl = null;
        }

        Company::create([
            "company_name" => $request->input("companyName"),
            "company_email" => $request->input("companyEmail"),
            "company_website" => $companyWebsite,
            "company_picture" => $logopathUrl,
        ]);

        return redirect("/")->with("message", "Company has been added");
    }

    public function update(Request $request, $id){

        // Automatically add 'https://' if the companyWebsite doesn't have it
        $companyWebsite = $request->input('editCompanyWebsite');

        if (!empty($companyWebsite) && !preg_match("~^(?:f|ht)tps?://~i", $companyWebsite)) {
            $companyWebsite = 'https://' . $companyWebsite;
        }

//        validation
        try {
            $request->validate([
                "editCompanyName" => "required|string|max:30",
                "editCompanyEmail" => "required|string|max:30",
                $companyWebsite => "nullable|string|url|max:80",
                "editCompanyLogo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            ]);

        } catch (ValidationException $e) {
            Log::info('Validation Errors:', $e->errors());
            return redirect()->back()->withErrors($e->errors());
        }

        if($request->hasFile("editCompanyLogo")){
            $logopath = $request->file("editCompanyLogo")->store("company_logos", "public");

            $logopathUrl = asset('storage/' . $logopath);
        } else {
            $logopathUrl = null;
        }


//        Find the Company
        $company = Company::findOrFail($id);

//        check which information has changed
        $changes = [];
        if ($request->input("editCompanyName") !== $company->company_name) {
            $changes["company_name"] = $request->input("editCompanyName");
        }

        if ($request->input("editCompanyEmail") !== $company->company_email) {
            $changes["company_email"] = $request->input("editCompanyEmail");
        }

        if ($companyWebsite !== $company->company_website) {
            $changes["company_website"] = $companyWebsite;
        }

        if ($logopathUrl !== null && $logopathUrl !== $company->company_picture) {
            $changes["company_picture"] = $logopathUrl;
        } else {
            $changes["company_picture"] = $company->company_picture;
        }

        // If there are no changes, return without updating
        if (empty($changes)) {
            return redirect()->back()->with("message", "No changes detected.");
        } else {
            // Update the employee details with changes
            $company->update($changes);
        }

        return redirect('/' . $company->id)->with('message', 'Employee updated successfully!');
    }

    public function destroy($id) {
        $company = Company::find($id);

//        check if the employee actually exists
        if (!$company) {
            return redirect("/")->with('error', 'Employee not found.');
        }

        $company->delete();

        return redirect("/")->with('message', 'Employee deleted successfully!');
    }
}
