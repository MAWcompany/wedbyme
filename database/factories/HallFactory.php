<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\HallAttribute;
use App\Models\HallTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class HallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attributes = HallAttribute::all()->map(function ($attr){ return $attr->id; });
        $types = HallTypes::all()->map(function ($type){ return $type->id; });
        $phones = [];
        for($i = 0;$i < rand(1,3);$i++){
            $phones[] = "+374".$this->faker->numberBetween(10000000,99999999);
        }
        $images = collect(Storage::disk("public")->files('test_data/foto'));
        $images = $images->random($this->faker->numberBetween(1,$images->count()));
        return [
            "images" => $images,
            "guest_count" => [rand(1,10)*10,rand(5,20)*10],
            "price" => [rand(2,5)*1000,rand(7,15)*1000],
            "coords" => [40 + $this->faker->randomFloat(5,-0.5,0.5),44 + $this->faker->randomFloat(5,-0.5,0.5)],
            "phones" => $phones,
            "types" => $types->random(rand(1,5))->toArray(),
            "attributes" => $attributes->random(rand(1,5))->toArray(),
            "review" => $this->faker->randomFloat(1,3,5),
            "address" => $this->faker->address
        ];
    }
}
