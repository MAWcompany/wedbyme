<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $logos = Storage::disk("public")->files("test_data/logo");

        return [
            "title" => $this->faker->company,
            "logo" => $this->faker->randomElement($logos),
            "about" => $this->faker->realText(2000),
        ];
    }
}
