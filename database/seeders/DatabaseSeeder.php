<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
// use \Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RugbyLeagueSeeder::class,
            RugbyUnionSeeder::class,
            TouchRugbySeeder::class,
        ]);

        $progressBar = $this
            ->command
            ->getOutput()
            ->createProgressBar();

        foreach ($progressBar->iterate(Sport::all()) as $sport) {
            Team::factory(5)
                ->for($sport)
                ->has(Person::factory(25)->for(User::factory()))
                ->create();
        }
    }
}
