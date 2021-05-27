<?php

namespace Database\Seeders;

use App\Models\HallAttribute;
use App\Models\HallTypes;
use Faker\Factory;
use Illuminate\Database\Seeder;

class HallTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0;$i < 5;$i++){
            HallTypes::create(['title' => $faker->jobTitle]);
        }
    }
}
