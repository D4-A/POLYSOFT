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
        $this->call(ServiceSeeder::class);
        $this->call(FonctionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(TypePaiementSeeder::class);
        $this->call(PaiementSeeder::class);
        $this->call(ConsultationsSeeder::class);
    }
}
