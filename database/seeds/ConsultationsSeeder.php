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
                               'length' => 10, 'prefix' => 'CONS']),
             'user_id' => 'USER000001',
             'patient_id' => 'PN00000001',
             'payement_id' => 'PAY0000001',
             'motif' => 'eeee',
             'antecedent' => 'gdgg',
             'historique' => 'hhhr',
             'examen_physique' => 'tttt',
             'hypothese_dia' => 'yeyey',
             'examen_compl' => 'yeyye',
             'traitement' => 'Pyeyye',
        ]);
         DB::table('consultations')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'consultations',
                               'length' => 10, 'prefix' => 'CONS']),
             'user_id' => 'USER000002',
             'patient_id' => 'PN00000002',
             'payement_id' => 'PAY0000002',
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
