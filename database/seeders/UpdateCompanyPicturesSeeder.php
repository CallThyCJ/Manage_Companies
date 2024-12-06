<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateCompanyPicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::all()->each(function ($company) {
            $randomSeed = rand(0, 100000);

            $company->update([
                'company_picture' => "https://picsum.photos/seed/{$randomSeed}/400/400"
            ]);
        });
    }
}
