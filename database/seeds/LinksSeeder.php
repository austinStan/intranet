<?php

use App\Models\Link as Models;
use Illuminate\Database\Seeder;



use Carbon\Carbon;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = Models::create([
            'title' => 'mylink',
            'description' => 'my link is awesome',
            'link' => 'www.google.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
