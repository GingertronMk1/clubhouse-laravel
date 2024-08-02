<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Position;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
// use \Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $teamsProgressBar = new ProgressBar($this->command->getOutput());
        foreach ($teamsProgressBar->iterate(range(0, 10, 2)) as $n) {
            $team = Team::factory()->for(Sport::factory()->has(Position::factory(5)))->create();
            for ($i = 0; $i < ($n * 10) + 1; $i++) {
                Person::factory()
                    ->hasAttached($team)
                    ->for(User::factory())
                    ->create();
            }
        }
    }
}
