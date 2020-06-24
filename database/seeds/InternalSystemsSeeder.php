<?php
use App\Models\Internalsystem as Models;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class InternalSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $internalsystem = Models::create([
            'name' => 'cyber-security',
            'link' =>'cybersecurity.co.ug',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
    }
}
