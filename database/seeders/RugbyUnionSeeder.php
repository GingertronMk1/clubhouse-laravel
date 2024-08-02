<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class RugbyUnionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sport = Sport::create([
            'id' => '01911450-4ae8-7581-b450-0637d3c26399',
            'name' => 'Rugby Union',
            'description' => '15-a-side rugby',
            'colour' => '#FF0000',
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
                'name' => 'Loosehead Prop',
                'sort_order' => 1,
                'default_number' => 1,
                'preview_position_x' => 90,
                'preview_position_y' => 85,
            ],
            [
                'name' => 'Hooker',
                'sort_order' => 2,
                'default_number' => 2,
                'preview_position_x' => 90,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Tighthead Prop',
                'sort_order' => 3,
                'default_number' => 3,
                'preview_position_x' => 90,
                'preview_position_y' => 15,
            ],
            [
                'name' => 'Blindside Lock',
                'sort_order' => 4,
                'default_number' => 4,
                'preview_position_x' => 75,
                'preview_position_y' => 65,
            ],
            [
                'name' => 'Openside Lock',
                'sort_order' => 5,
                'default_number' => 5,
                'preview_position_x' => 75,
                'preview_position_y' => 35,
            ],
            [
                'name' => 'Blindside Flanker',
                'sort_order' => 6,
                'default_number' => 6,
                'preview_position_x' => 75,
                'preview_position_y' => 95,
            ],
            [
                'name' => 'Openside Flanker',
                'sort_order' => 7,
                'default_number' => 7,
                'preview_position_x' => 75,
                'preview_position_y' => 5,
            ],
            [
                'name' => 'Number 8',
                'sort_order' => 8,
                'default_number' => 8,
                'preview_position_x' => 60,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Scrum-Half',
                'sort_order' => 9,
                'default_number' => 9,
                'preview_position_x' => 50,
                'preview_position_y' => 40,
            ],
            [
                'name' => 'Fly-Half',
                'sort_order' => 10,
                'default_number' => 10,
                'preview_position_x' => 40,
                'preview_position_y' => 30,
            ],
            [
                'name' => 'Left Wing',
                'sort_order' => 11,
                'default_number' => 11,
                'preview_position_x' => 10,
                'preview_position_y' => 100,
            ],
            [
                'name' => 'Inside Centre',
                'sort_order' => 12,
                'default_number' => 12,
                'preview_position_x' => 30,
                'preview_position_y' => 20,
            ],
            [
                'name' => 'Outside Centre',
                'sort_order' => 13,
                'default_number' => 13,
                'preview_position_x' => 20,
                'preview_position_y' => 10,
            ],
            [
                'name' => 'Right Wing',
                'sort_order' => 14,
                'default_number' => 14,
                'preview_position_x' => 10,
                'preview_position_y' => 0,
            ],
            [
                'name' => 'Fullback',
                'sort_order' => 15,
                'default_number' => 15,
                'preview_position_x' => 0,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Bench',
                'sort_order' => 16,
                'default_number' => 16,
                'preview_position_x' => 40,
                'preview_position_y' => 0,
            ],
        ];
    }
}
