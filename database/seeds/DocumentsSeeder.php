<?php

use App\Models\Documents as Models;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $documents = Models::create([
            'name' => 'Programming',
            'image'=> 'https://source.unsplash.com/random',
            'department_id' =>rand(1,3),
            'description' => 'Programming is awesome',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
