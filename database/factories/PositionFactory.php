<?php

namespace Database\Factories;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var int<0,2> $leftRightOrMiddle */
        $leftRightOrMiddle = $this->faker->numberBetween(0, 2);
        $prefix = match ($leftRightOrMiddle) {
            0 => 'Left',
            1 => $this->faker->boolean() ? 'Full' : 'Middle',
            2 => 'Right'
        };

        return [
            'name' => $prefix.' '.$this->faker->word(),
            'description' => $this->faker->text(),
            'preview_x' => $this->faker->numberBetween(0, 100),
            'preview_y' => match ($leftRightOrMiddle) {
                0 => $this->faker->numberBetween(0, 33),
                1 => $this->faker->numberBetween(34, 66),
                2 => $this->faker->numberBetween(67, 100),
            },
            'sort_order' => $this->faker->numberBetween(0, 100),
            'default_number' => $this->faker->numberBetween(0, 100),
            'sport_id' => Sport::count() < 10 ? Sport::factory() : Sport::get()->random(),
        ];
    }
}
