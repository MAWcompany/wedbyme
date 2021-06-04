<?php

namespace Database\Factories;

use App\Models\Calendar;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalendarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Calendar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date" => $this->faker->dateTimeBetween("-1 years"),
            "comment" => $this->faker->numberBetween(0,5) > 4 ? $this->faker->realText(200) : ""
        ];
    }
}
