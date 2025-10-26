<?php

namespace Database\Factories;

use App\Models\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Occupation>
 */
class OccupationFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->jobTitle,
            'parent_id' => null, // default root level
        ];
    }

    /**
     * Create a child occupation under a parent
     */
    public function childOf(Occupation $parent)
    {
        return $this->state(function () use ($parent) {
            return [
                'parent_id' => $parent->id,
            ];
        });
    }
}
