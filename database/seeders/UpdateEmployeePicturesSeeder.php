<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateEmployeePicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::all()->each(function ($employee) {
            $randomSeed = rand(0, 100000);

            $employee->update([
                'company_picture' => "https://picsum.photos/seed/{$randomSeed}/400/400"
            ]);
        });
    }
}
