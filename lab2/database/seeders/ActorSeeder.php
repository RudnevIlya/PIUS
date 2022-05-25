<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.Class "Databas
     *
     * @return void
     */
    public function run()
    {
        Actor::factory()
            ->count(100)
            ->create();
    }
}

