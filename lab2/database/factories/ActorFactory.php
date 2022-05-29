<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\Actor;
//@extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<app\Domain\Actor\Models>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;
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
            'full_name'=>(Str::random(14)." ".Str::random(14)." ".Str::random(14)),
            'height'=>mt_rand(80,250),
            'birthdate'=> date('Y-m-d', $val),
        ];
    }
}
