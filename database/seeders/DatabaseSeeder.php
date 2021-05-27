<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Company;
use App\Models\Hall;
use App\Models\HallTypes;
use App\Models\User;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HallAttributeSeeder::class);
        $this->call(HallTypeSeeder::class);
        User::factory(10)->create()->each(function (User $user){
            $company = $user->company()->save(Company::factory()->make());
            for($i = 0;$i < rand(1,5);$i++) {
                $hall = Hall::factory()->make();
                $company->halls()->save($hall);
                for($i = 10;$i < rand(20,100);$i++){
                    $calendar = Calendar::factory()->make();
                    $hall->calendar()->save($calendar);
                }
            }
        });
    }
}

