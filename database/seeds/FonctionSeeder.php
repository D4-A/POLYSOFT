<?php

use Illuminate\Database\Seeder;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fonctions')->insert([
            'name' => 'Admin',
            'diplome' => 'Bac'
        ]);
        DB::table('fonctions')->insert([
            'name' => 'Docteur',
            'diplome' => 'Bac'
        ]);
    }
}
