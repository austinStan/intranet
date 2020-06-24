<?php

use App\Models\Department as Models;
use Illuminate\Database\Seeder;


use Carbon\Carbon;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Models::create([
            'name' => 'Programming',
            'description' => 'Programming is awesome',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
