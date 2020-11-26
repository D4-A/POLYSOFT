<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ConsultationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('consultations')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'consultations',
                               'length' => 7, 'prefix' => 'CONS']),
             'user_id' => 'US001',
             'patient_id' => 'PN001',
             'paiement_id' => 'FA001',
             'motif' => 'Diarhée',
             'antecedent' => 'Amibes',
             'historique' => 'Trois jours',
             'examen_physique' => 'Aucun',
             'hypothese_dia' => 'Intoxication',
             'examen_compl' => 'Aucun',
             'traitement' => 'Vermox',
             'created_at' => '2020-11-01'
        ]);
         DB::table('consultations')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'consultations',
                               'length' => 7, 'prefix' => 'CONS']),
             'user_id' => 'US002',
             'patient_id' => 'PN002',
             'paiement_id' => 'FA002',
             'motif' => 'Vomissement',
             'antecedent' => 'Maladie Estomac',
             'historique' => 'Une semaine',
             'examen_physique' => 'Aucun',
             'hypothese_dia' => 'Crise Estomac',
             'examen_compl' => 'Odioscopie',
             'traitement' => 'Ibubrifène',
             'created_at' => '2020-11-01'
        ]);
    }
}
