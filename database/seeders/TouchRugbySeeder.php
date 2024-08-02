<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class TouchRugbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sport = Sport::create([
            'id' => '0191145f-3f6a-76e9-8029-1870bd5527fd',
            'name' => 'Touch Rugby',
            'description' => '6-a-side rugby, sans contact',
            'colour' => '#00FFFF',
        ]);

        foreach ($this->getPositions() as $position) {
            $sport->positions()->create($position);
        }
    }

    /**
     * @return array<array<string, string|int>>
     */
    private function getPositions(): array
    {
        return [
            [
                'name' => 'Left Wing',
                'sort_order' => 1,
                'default_number' => 1,
                'preview_position_x' => 0,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Left Link',
                'sort_order' => 2,
                'default_number' => 2,
                'preview_position_x' => 20,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Left Mid',
                'sort_order' => 3,
                'default_number' => 3,
                'preview_position_x' => 40,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Right Mid',
                'sort_order' => 4,
                'default_number' => 4,
                'preview_position_x' => 60,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Right Link',
                'sort_order' => 5,
                'default_number' => 5,
                'preview_position_x' => 80,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Right Wing',
                'sort_order' => 6,
                'default_number' => 6,
                'preview_position_x' => 100,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Bench',
                'sort_order' => 7,
                'default_number' => 7,
                'preview_position_x' => 50,
                'preview_position_y' => 0,
            ],
        ];
    }
}
