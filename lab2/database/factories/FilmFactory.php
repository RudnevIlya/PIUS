<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $min = strtotime(date("1930-01-01"));
        $max = strtotime(date("Y-m-d"));
        $val = rand($min, $max);
        return [
            'title'=> Str::random(20),
            'duration'=> mt_rand(60,180),
            'rate'=> round(mt_rand(1,99)/10,1),
            'premiere_date'=> date('Y-m-d', $val),
        ];
    }
}
