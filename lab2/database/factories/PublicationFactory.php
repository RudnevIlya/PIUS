<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publication>
 */
class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::random(20),
            'token' => Str::random(5),
            'content' => Str::random(40),
            //'created_datetime' => date("Y-m-d H:i:s"),
            'author' => Str::random(20)
        ];
    }
}
