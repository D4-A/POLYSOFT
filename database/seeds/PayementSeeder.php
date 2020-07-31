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
            'user_id' => 1,
            'patient_id' => 1,
            'type_payement_id' => 1
        ]);
          DB::table('payements')->insert([
            'user_id' => 2,
            'patient_id' => 1,
            'type_payement_id' => 2
        ]);
           DB::table('payements')->insert([
            'user_id' => 2,
            'patient_id' => 1,
            'type_payement_id' => 2
        ]);
    }
}
