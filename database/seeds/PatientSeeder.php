<?php

use Illuminate\Database\Seeder;

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
            'nom' => 'Gateka',
            'prenom' => 'Audrine',
            'genre' => 'F',
            'ans_naiss' => '1345',
            'profession' => 'Etudiant',
            'adresse' => 'kibenga',
            'tel' => 71111111,
            'email' => 'audrine@gnu.org',
            'cni' => 'P6666',
        ]);
        DB::table('patients')->insert([
            'nom' => 'ngabirano',
            'prenom' => 'brice',
            'genre' => 'P2M',
            'ans_naiss' => '12234',
            'profession' => 'Etudiant',
            'adresse' => 'ngangara',
            'tel' => 711111112,
            'email' => 'brice@gnu.org',
            'cni' => 'P26666',
        ]);
    }
}
