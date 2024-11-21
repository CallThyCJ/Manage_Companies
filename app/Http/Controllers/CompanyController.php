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
}
