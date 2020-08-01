<?php

use Illuminate\Database\Seeder;

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
             'user_id' => 1,
             'patient_id' => 1,
             'payement_id' => 1,
             'motif' => 'eeee',
             'antecedent' => 'gdgg',
             'historique' => 'hhhr',
             'examen_physique' => 'tttt',
             'hypothese_dia' => 'yeyey',
             'examen_compl' => 'yeyye',
             'traitement' => 'Pyeyye',
        ]);
         DB::table('consultations')->insert([
             'user_id' => 1,
             'patient_id' => 2,
             'payement_id' => 2,
             'motif' => 'reeee',
             'antecedent' => 'rgdgg',
             'historique' => 'rhhhr',
             'examen_physique' => 'rtttt',
             'hypothese_dia' => 'ryeyey',
             'examen_compl' => 'ryeyye',
             'traitement' => 'rrPyeyye',
        ]);
    }
}