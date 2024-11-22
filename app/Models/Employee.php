<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public static function fetchWithCompanyLogo() {
        $employeesWithLogo = [];

        $employees = Employee::all();
        foreach ($employees as $employee) {
            $company = $employee->company;

            $employeesWithLogo[] = [
                "first_name" => $employee->first_name,
                "last_name" => $employee->last_name,
                "id" => $employee->id,
                "company_logo" => $company ? $company->company_picture : null,
            ];
        }

        return $employeesWithLogo;
    }
}
