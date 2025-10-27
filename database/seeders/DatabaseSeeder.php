<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\Occupation;
use App\Models\Organization;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $rootNames = ['Automotive', 'IT & Software', 'Construction', 'Healthcare', 'Education', 'Retail'];
        $occupations = [];

        for ($i = 0; $i < count($rootNames); $i++) {
            $root = Occupation::factory()->create(['name' => $rootNames[$i]]);

            $level2a = Occupation::factory()->childOf($root)->create(['name' => $faker->jobTitle]);
            $level2b = Occupation::factory()->childOf($root)->create(['name' => $faker->jobTitle]);
            $level3a = Occupation::factory()->childOf($level2a)->create(['name' => $faker->jobTitle]);

            $occupations = array_merge($occupations, [$root, $level2a, $level2b, $level3a]);
        }

        // --- 2. Create 5 to 10 houses ---
        $houseCount = rand(5, 10);
        $houses = House::factory()->count($houseCount)->create();

        // --- 3. Create organizations ---
        $orgCount = 15; // total number of organizations
        for ($i = 1; $i <= $orgCount; $i++) {
            $house = $houses->random();

            $organization = Organization::factory()
                ->withPhones(rand(1, 3))
                ->create(['house_id' => $house->id]);

            // --- 4. Attach at least one occupation ---
            for ($j = 0; $j <= rand(1, 6); $j++) {
                $organization->occupations()->syncWithoutDetaching([
                    $occupations[array_rand($occupations)]['id'],
                ]);
            }
        }
    }
}
