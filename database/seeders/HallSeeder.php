<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\CalendarDay;
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
        User::companies()->each(function ($user){
            $halls = Hall::factory()->count(rand(1,10))->make();
            $user->halls()->saveMany($halls);
            foreach ($user->halls as $hall){
                $hall->calendar->days()->saveMany(CalendarDay::factory()->count(rand(3,10))->make());
            }
        });
    }
}
