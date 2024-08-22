<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::get()->each(function (User $user) {
            $user->person()->create([
                'name' => $user->name,
                'dob' => '1970-01-01',
                'bio' => fake()->paragraphs(3, true),
            ]);
        });
    }
}
