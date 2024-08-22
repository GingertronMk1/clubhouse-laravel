<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly Filesystem $filesystem
    ) {}

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SportSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            PersonSeeder::class,
        ]);

        $seededClasses = [
            Sport::class,
            Team::class,
            User::class,
            Person::class,
        ];

        /** @var class-string $class */
        foreach ($seededClasses as $class) {
            $all = [];
            foreach ($class::all() as $item) {
                $all[] = $item->toArray();
            }
            $this->filesystem->put("{$class}.txt", var_export($all, true));
        }
    }
}
