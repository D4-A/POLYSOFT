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
            'nom' => 'Pfleury',
            'prenom' => 'Pguy',
            'genre' => 'PM',
            'age' => 15,
            'profession' => 'PEtudiant',
            'adresse' => 'Pkibenga',
            'tel' => 71111111,
            'email' => 'gfleury@disroot.org',
            'cni' => 'P6666',
        ]);
        DB::table('patients')->insert([
            'nom' => 'P2fleury',
            'prenom' => 'P2guy',
            'genre' => 'P2M',
            'age' => 15,
            'profession' => 'P2Etudiant',
            'adresse' => 'P2kibenga',
            'tel' => 711111112,
            'email' => 'g2fleury@disroot.org',
            'cni' => 'P26666',
        ]);
    }
}
