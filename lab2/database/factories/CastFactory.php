<?php

namespace Database\Factories;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cast>
 */
class CastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_film' => Film::inRandomOrder()->first()->id,
            'id_actor' => Actor::inRandomOrder()->first()->id
        ];
    }
}
