<?php

use Illuminate\Database\Seeder;

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
            'user_id' => 'USER000001',
            'patient_id' => 1,
            'type_payement_id' => 'T001'
        ]);
          DB::table('payements')->insert([
            'user_id' => 'USER000002',
            'patient_id' => 1,
            'type_payement_id' => 'T002'
        ]);
           DB::table('payements')->insert([
            'user_id' => 'USER000002',
            'patient_id' => 1,
            'type_payement_id' => 'T003'
        ]);
    }
}
