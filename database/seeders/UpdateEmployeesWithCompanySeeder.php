<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateEmployeesWithCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();

        Employee::all()->each(function ($employee) use ($companies) {
            $employee->update([
                'company_id' => $companies->random()->id, // Assign a random company
            ]);
        });
    }
}
