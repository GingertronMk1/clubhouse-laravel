<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class RugbyLeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sport = Sport::create([
            'id' => '0191144f-e449-7998-8ccd-10cfc94756aa',
            'name' => 'Rugby League',
            'description' => '13-a-side rugby',
            'colour' => '#FFFFFF',
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
                'name' => 'Fullback',
                'sort_order' => 1,
                'default_number' => 1,
                'preview_position_x' => 0,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Left Wing',
                'sort_order' => 2,
                'default_number' => 2,
                'preview_position_x' => 10,
                'preview_position_y' => 100,
            ],
            [
                'name' => 'Left Center',
                'sort_order' => 3,
                'default_number' => 3,
                'preview_position_x' => 15,
                'preview_position_y' => 75,
            ],
            [
                'name' => 'Right Center',
                'sort_order' => 4,
                'default_number' => 4,
                'preview_position_x' => 15,
                'preview_position_y' => 25,
            ],
            [
                'name' => 'Right Wing',
                'sort_order' => 5,
                'default_number' => 5,
                'preview_position_x' => 10,
                'preview_position_y' => 0,
            ],
            [
                'name' => 'Stand-Off',
                'sort_order' => 6,
                'default_number' => 6,
                'preview_position_x' => 33,
                'preview_position_y' => 66,
            ],
            [
                'name' => 'Scrum-Half',
                'sort_order' => 7,
                'default_number' => 7,
                'preview_position_x' => 40,
                'preview_position_y' => 33,
            ],
            [
                'name' => 'Left Prop',
                'sort_order' => 8,
                'default_number' => 8,
                'preview_position_x' => 85,
                'preview_position_y' => 100,
            ],
            [
                'name' => 'Hooker',
                'sort_order' => 9,
                'default_number' => 9,
                'preview_position_x' => 85,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Right Prop',
                'sort_order' => 10,
                'default_number' => 10,
                'preview_position_x' => 85,
                'preview_position_y' => 0,
            ],
            [
                'name' => 'Left Second-Row',
                'sort_order' => 11,
                'default_number' => 11,
                'preview_position_x' => 70,
                'preview_position_y' => 75,
            ],
            [
                'name' => 'Right Second-Row',
                'sort_order' => 12,
                'default_number' => 12,
                'preview_position_x' => 70,
                'preview_position_y' => 25,
            ],
            [
                'name' => 'Loose-Forward',
                'sort_order' => 13,
                'default_number' => 13,
                'preview_position_x' => 60,
                'preview_position_y' => 50,
            ],
            [
                'name' => 'Bench',
                'sort_order' => 14,
                'default_number' => 14,
                'preview_position_x' => 50,
                'preview_position_y' => 0,
            ],
        ];
    }
}
