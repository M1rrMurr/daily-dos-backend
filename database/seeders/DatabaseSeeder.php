<?php

namespace Database\Seeders;

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

        User::create(['email' => 'zsoli@gmail.com', 'password' => 'password', 'name' => 'zsoli']);
        User::factory(10)->create();
        $this->call([TagSeeder::class, ActivitySeeder::class]);
    }
}
