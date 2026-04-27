<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Person::factory()->count(5000)->create();

        // When you want to create a specific user with specific data, you can use the following code:

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'editor',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PersonSeeder::class,
        ]);
        // php artisan db:seed [This is the command to run the seeder in terminal]
        // php artisan migrate:refresh --seed [This is the command to refresh the database and run the seeder in terminal]
        // php artisan db:seed --class=PersonSeeder [This is the command to run a specific seeder in terminal]
        // php artisan make:model person -mfsc [This is the command to create model, migration, factory and seeder for person in terminal]

        // php artisan make:migration rename_column_to_people_table --table=people [This is the command to create a migration to rename a column in people table in terminal]
    }
}
