<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            SportSeeder::class,
            TeamSeeder::class,
        ]);

        $seededClasses = [
            Sport::class,
            Team::class,
        ];

        foreach ($seededClasses as $class) {
            $all = [];
            foreach ($class::all() as $item) {
                $all[] = $item->toArray();
            }
            $this->filesystem->put("{$class}.txt", var_export($all, true));
        }
    }
}
