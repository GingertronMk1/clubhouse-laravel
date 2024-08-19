<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getSports() as $sport) {
            Sport::create($sport);
        }
    }

    private function getSports(): array
    {
        return [
            0 => [
                'id' => '019169e3-e100-7449-926f-c544764b069f',
                'name' => 'Rugby League',
            ],
            1 => [
                'id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'name' => 'Rugby Union',
            ],
            2 => [
                'id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'name' => 'Touch Rugby',
            ],
            3 => [
                'id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'name' => 'American Football',
            ],
            4 => [
                'id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'name' => 'Canadian Football',
            ],
            5 => [
                'id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'name' => 'Epee',
            ],
            6 => [
                'id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'name' => 'Foil',
            ],
            7 => [
                'id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'name' => 'Sabre',
            ],
            8 => [
                'id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'name' => 'Snooker',
            ],
            9 => [
                'id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'name' => 'Pool',
            ],
        ];
    }
}
