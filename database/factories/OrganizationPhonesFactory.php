<?php

namespace Database\Factories;

use App\Models\OrganizationPhones;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<OrganizationPhones>
 */
class OrganizationPhonesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
