<?php

use App\Models\Event as Models;
use Illuminate\Database\Seeder;

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
        $events = Models::create([
            'title' => 'Blood Donation',
            'venue' =>'makerere university freedom square',
            'image' => 'https://source.unsplash.com/random',
            'description' =>'Blood donations  save a million lives in uganda.Be part!!!!',
            'start_date' => Carbon::parse('2000-01-01'),
            'end_date' => Carbon::parse('2008-01-05'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
