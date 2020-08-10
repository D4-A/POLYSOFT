<?php

use Illuminate\Database\Seeder;

class TypePayementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_payements')->insert([
            'name' => 'Cons infirmier',
            'montant' => '1500'
        ]);
        DB::table('type_payements')->insert([
            'name' => 'Cons Dr generaliste',
            'montant' => '10000'
        ]);
    }
}
