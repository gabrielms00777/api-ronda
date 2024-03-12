<?php

namespace Database\Factories;

use App\Models\Stop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoundRecord>
 */
class RoundRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stop_id' => Stop::factory(),
            'user_id' => User::factory(),
            'date_time' => $this->faker->dateTime(),
            'photo' => null,
            'observation' => $this->faker->text(),
        ];
    }
}
