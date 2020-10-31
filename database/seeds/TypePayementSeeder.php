<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
            'id' => IdGenerator::generate
                             (['table' => 'type_payements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Cons infirmier',
            'montant' => '1500'
        ]);
        DB::table('type_payements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'type_payements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Cons Dr generaliste',
            'montant' => '10000'
        ]);
        DB::table('type_payements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'type_payements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Cons Dr specialiste',
            'montant' => '10000'
        ]);
    }
}
