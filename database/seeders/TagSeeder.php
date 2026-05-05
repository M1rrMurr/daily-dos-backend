<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $activityNames = ['physcial activity', 'learning', 'relaxing', 'working'];


    public function run(): void
    {
        foreach ($this->activityNames as $activity) {
            Tag::create(['name' => $activity]);
        }
    }
}
