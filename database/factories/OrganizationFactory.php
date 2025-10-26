<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'house_id' => House::factory(), // automatically create a house
        ];
    }

    /**
     * Add phones to the organization
     */
    public function withPhones(int $count = 2)
    {
        return $this->has(\App\Models\OrganizationPhones::factory()->count($count), 'phones');
    }

    /**
     * Add occupations to the organization
     */
    public function withOccupations(array $occupations)
    {
        return $this->afterCreating(function (Organization $organization) use ($occupations) {
            $occupationIds = [];
            foreach ($occupations as $occData) {
                $occupation = \App\Models\Occupation::findOrCreate(
                    $occData['name'],
                    $occData['parent_id'] ?? null
                );
                $occupationIds[] = $occupation->id;
            }
            $organization->occupations()->syncWithoutDetaching($occupationIds);
        });
    }
}
