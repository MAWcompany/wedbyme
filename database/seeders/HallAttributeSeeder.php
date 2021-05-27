<?php

namespace Database\Seeders;

use App\Models\HallAttribute;
use App\Models\HallTypes;
use Faker\Factory;
use Faker\Provider\Company;
use Illuminate\Database\Seeder;

class HallAttributeSeeder extends Seeder
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
            HallAttribute::create(['title' => $faker->jobTitle]);
        }
    }
}
