<?php

use Illuminate\Database\Seeder;
use App\Models\News as Models;

use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = Models::create([
            'title' => 'COVID-19 outbreak',
            'description' =>'We may get to see a second wave of spreading from china!',
            'department_id' =>rand(1,3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }

}
