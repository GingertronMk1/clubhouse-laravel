<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(25)->has(Person::factory())->create();
        Team::factory(5)->create();
    }
}
