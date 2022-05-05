<?php

namespace Database\Seeders;
use App\Models\PublicationsTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PublicationsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicationsTags::factory()
                ->count(100)
                ->create();
    }
}
