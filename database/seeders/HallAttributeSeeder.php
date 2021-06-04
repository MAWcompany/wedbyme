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
        $attrs = [
            "Ավտոկայանատեղի",
            "Այգի",
            "Շատրվան",
            "Կենդանի երաժշտություն",
            "Լողավազան",
            "Մանկական սենյակ",
            "Պարահրապարակ",
        ];
        foreach ($attrs as $attr) {
            HallAttribute::create(['title' => $attr]);
        }
    }
}
