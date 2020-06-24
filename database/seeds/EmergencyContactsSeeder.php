<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;

class EmergencyContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        
        DB::table('emergencycontacts')->insert([
            'name' => 'Taya Smith',
            'phonenumber'=>'0701696884',
            'email' => 'tayasmith@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
