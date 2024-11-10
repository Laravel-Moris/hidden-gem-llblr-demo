<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (User::all() as $user) {
            $user->notes()->createMany([
                ['content' => fake()->paragraph()],
                ['content' => fake()->paragraph()],
                ['content' => fake()->paragraph()],
            ]);
        }
    }
}
