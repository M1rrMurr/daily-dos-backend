<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $userIds = User::all()->pluck('id');
        return [
            'user_id' => fake()->randomElement($userIds),
            'name' => fake()->realText(10),
            'description' => fake()->realText(25),
            'start_time' => fake()->dateTimeBetween('now', '+1 week'),
            //add random amount of time to the start time
            'end_time' => function (array $attributes) {
                $start = $attributes['start_time'];
                return Carbon::instance($start)->addMinutes(rand(15, 60));
            },
            'priority' => rand(1, 3)



        ];
    }

    public function me(): static
    {
        return $this->state(fn(array $attributes) => ['user_id' => 1]);
    }
}
