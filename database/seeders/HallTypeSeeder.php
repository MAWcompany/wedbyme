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
        $types = [
            "Հարսանյաց սրահ",
            "Սգո սրահ",
            "Հանդիսությունների սրահ",
            "Քոթեջ",
            "Հանգստյան Տներ",
            "Վիլլաներ",
        ];
        foreach ($types as $type){
            HallTypes::create(['title' => $type]);
        }

    }
}
