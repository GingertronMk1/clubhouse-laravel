<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        foreach($teamsProgressBar->iterate(range(1, 10, 2)) as $n) {
            Team::factory()
                ->has(
                    Person::factory($n * 5)
                        ->has(
                            User::factory()
                        )
                )
                ->create();
        }
    }
}
