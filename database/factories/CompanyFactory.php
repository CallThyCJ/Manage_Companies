<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(),
            "company_picture" => $this->faker->imageUrl(),
            "company_website" => $this->faker->url(),
            "company_email" => $this->faker->unique()->safeEmail(),
            //
        ];
    }
}
