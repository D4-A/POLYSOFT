<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'patients',
                               'length' => 5, 'prefix' => 'PN']),
            'nom' => 'IRAMBONA',
            'prenom' => 'Patricia',
            'genre' => 'Féminin',
            'ans_naiss' => '1995-05-25',
            'profession' => 'Etudiante',
            'adresse' => 'kibenga',
            'tel' => 71100100,
            'email' => 'patricia@gnu.org',
            'cni' => '123.123/8523',
        ]);
        DB::table('patients')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'patients',
                               'length' => 5, 'prefix' => 'PN']),
            'nom' => 'NDIZEYE',
            'prenom' => 'Philippe',
            'genre' => 'Masculin',
            'ans_naiss' => '1986-06-12',
            'profession' => 'Sans',
            'adresse' => 'Ngangara',
            'tel' => 71200200,
            'email' => 'philippe@gnu.org',
            'cni' => '789.785/2545',
        ]);
    }
}
