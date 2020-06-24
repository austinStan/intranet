<?php

use App\Models\Annoucement as Models;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AnnoucementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annoucements = Models::create([
            'title' => 'General Meeting',
            'description' =>'makerere university freedom square',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
