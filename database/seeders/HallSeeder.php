<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user){
            for($j = 0;$j < rand(1,5);$j++) {
                $hall = Hall::factory()->make();
                $user->halls()->save($hall);
                for($i = 10;$i < rand(20,100);$i++){
                    $calendar = Calendar::factory()->make();
                    $hall->calendar()->save($calendar);
                }
            }
        });
    }
}
