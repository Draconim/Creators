<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTime(),
            'duration' => $this->faker->time(),
            'code' => $this->faker->unique()->text(6),
            'check-in_time' => $this->faker->dateTime(),
        ];
    }
}
