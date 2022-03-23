<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event_User_Status>
 */
class Event_User_StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'event_id' => \App\Models\Event::inRandomOrder()->first()->id,
            'status_id' => \App\Models\Status::inRandomOrder()->first()->id,
        ];
    }
}
