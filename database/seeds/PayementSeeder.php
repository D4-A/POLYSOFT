<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PayementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('payements')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'payements',
                               'length' => 10, 'prefix' => 'PAY']),
            'user_id' => 'USER000001',
            'patient_id' => 'PN00000001',
             'type_payement_id' => 'T001',
             'created_at' => '2020-11-01'
        ]);
         DB::table('payements')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'payements',
                               'length' => 10, 'prefix' => 'PAY']),
             'user_id' => 'USER000002',
             'patient_id' => 'PN00000001',
             'type_payement_id' => 'T002',
             'created_at' => '2020-11-01'
        ]);
           DB::table('payements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'payements',
                               'length' => 10, 'prefix' => 'PAY']),
            'user_id' => 'USER000002',
            'patient_id' => 'PN00000001',
            'type_payement_id' => 'T003',
            'created_at' => '2020-11-01'
        ]);
    }
}
