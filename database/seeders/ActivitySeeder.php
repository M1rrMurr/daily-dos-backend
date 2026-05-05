<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \Illuminate\Support\Collection $tagIds */
        $tagIds = Tag::pluck('id');
        Activity::factory(100)->create()->each(function (Activity $activity) use ($tagIds) {
            $activity->tags()->sync($tagIds->random(rand(1, 2)));
        });
        // create activities for user id 1
        Activity::factory(100)->me()->create()->each(function (Activity $activity) use ($tagIds) {
            $activity->tags()->sync($tagIds->random(rand(1, 2)));
        });
    }
}
