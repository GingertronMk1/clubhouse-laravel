<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Game;
use App\Models\Person;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Seeder;
use ReflectionClass;
use ReflectionException;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly Filesystem $filesystem
    ) {}

    /**
     * Seed the application's database.
     *
     * @throws ReflectionException
     */
    public function run(): void
    {
        $this->call([
            SportSeeder::class,
            TeamSeeder::class,
            UserSeeder::class,
            PersonSeeder::class,
            CompetitionSeeder::class,
            GameSeeder::class,
        ]);

        $seededClasses = [
            Sport::class,
            Team::class,
            User::class,
            Person::class,
            Competition::class,
            Game::class,
        ];

        /** @var class-string $class */
        foreach ($seededClasses as $key => $class) {
            $all = [];
            foreach ($class::with([])->get() as $item) {
                $all[] = $item->toArray();
            }
            $exportedData = var_export($all, true);
            $shortClassName = (new ReflectionClass($class))->getShortName();
            $this->filesystem->put(
                "seeds/{$key}_{$shortClassName}.php",
                <<<PHP
                    <?php

                    return {$exportedData};

                    PHP
            );
        }
    }
}
