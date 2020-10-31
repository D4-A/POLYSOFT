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
                               'length' => 10, 'prefix' => 'PN']),
            'nom' => 'IRAMBANA',
            'prenom' => 'Patrick',
            'genre' => 'Feminin',
            'ans_naiss' => '1345',
            'profession' => 'Etudiant',
            'adresse' => 'kibenga',
            'tel' => 71111111,
            'email' => 'patrick@gnu.org',
            'cni' => 'P6666',
        ]);
        DB::table('patients')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'patients',
                               'length' => 10, 'prefix' => 'PN']),
            'nom' => 'ngabirano',
            'prenom' => 'brice',
            'genre' => 'Masculin',
            'ans_naiss' => '1224',
            'profession' => 'Etudiant',
            'adresse' => 'ngangara',
            'tel' => 7111119,
            'email' => 'brice@gnu.org',
            'cni' => 'P26666',
        ]);
    }
}
