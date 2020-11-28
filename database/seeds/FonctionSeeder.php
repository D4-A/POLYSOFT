<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Admin',
            'diplome' => 'Baccalauréat'
        ]);
        DB::table('fonctions')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Docteur',
            'diplome' => 'Doctorat'
        ]);
        DB::table('fonctions')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Infirmier ',
            'diplome' => 'A2'
        ]);
        DB::table('fonctions')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Laborantin',
            'diplome' => 'A2'
        ]);
        DB::table('fonctions')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Receptionniste',
            'diplome' => 'Humanite'
        ]);
        DB::table('fonctions')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'fonctions',
                               'length' => 4, 'prefix' => 'F']),
            'name' => 'Caissier',
            'diplome' => 'Humanite'
        ]);
    }
}
