<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call(AdminSeeder::class); 
        $this->call(LinksSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(DocumentsSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(AnnoucementsSeeder::class);
        $this->call(InternalSystemsSeeder::class);
        $this->call(EmergencyContactsSeeder::class);
        $this->call(IncidentReportingsSeeder::class);
        $this->call(ComputerAssistanceSeeder::class);
    }
}
