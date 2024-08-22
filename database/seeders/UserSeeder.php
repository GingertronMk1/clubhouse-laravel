<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            User::factory([
                'name' => "Test User {$i}",
                'email' => "{$i}user@clubhouse.test",
            ])->create();
        }
    }
}
