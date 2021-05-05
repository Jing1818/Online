<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship;

class InternshipsTableSeeder extends Seeder
{
    public function run()
    {
        Internship::factory()->count(10)->create();
    }
}

