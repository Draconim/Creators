<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = Carbon::create(2022,4,15,13,0,0);
        $d12 = Carbon::create(2022,4,15,12,30,0);
        $d2 = Carbon::create(2022,4,17,14,0,0);
        $d22 = Carbon::create(2022,4,17,13,40,0);
        $d3 = Carbon::create(2022,4,22,16,0,0);
        $d32 = Carbon::create(2022,4,22,15,30,0);
        Event::create([
            'name' => 'Futóverseny',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae aperiam sapiente, laborum esse nam tempora totam quaerat? Numquam quia, sint sed minus ipsam reprehenderit ex, magnam debitis ipsa, temporibus dolores?',
            'date' =>  $d1->toDateTimeString(),
            'duration' => '02:00:00',
            'code' =>'a',
            'check_in_time' => $d12->toDateTimeString()
        ]);
        Event::create([
            'name' => 'Röplabda mérkőzés',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae aperiam sapiente, laborum esse nam tempora totam quaerat? Numquam quia, sint sed minus ipsam reprehenderit ex, magnam debitis ipsa, temporibus dolores?',
            'date' => $d2->toDateTimeString(),
            'duration' => '02:30:00',
            'code' =>'b',
            'check_in_time' => $d22->toDateTimeString()
        ]);
        Event::create([
            'name' => 'Foci mérkőzés',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae aperiam sapiente, laborum esse nam tempora totam quaerat? Numquam quia, sint sed minus ipsam reprehenderit ex, magnam debitis ipsa, temporibus dolores?',
            'date' => $d3->toDateTimeString(),
            'duration' => '03:00:00',
            'code' =>'c',
            'check_in_time' => $d32->toDateTimeString()
        ]);
    }
}
