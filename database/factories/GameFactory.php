<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'start' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
            'summary' => $this->faker->text(),
            'competition_id' => Competition::count() < 10 ? Competition::factory() : Competition::get()->random(),
            'team_1_id' => Team::count() < 10 ? Team::factory() : Team::get()->random(),
            'team_2_id' => Team::count() < 10 ? Team::factory() : Team::get()->random(),
        ];
    }
}
