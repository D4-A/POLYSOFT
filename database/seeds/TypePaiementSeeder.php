<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TypePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_paiements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'type_paiements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Consultation Infirmier',
            'montant' => '1500'
        ]);
        DB::table('type_paiements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'type_paiements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Cons Dr généraliste',
            'montant' => '5000'
        ]);
        DB::table('type_paiements')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'type_paiements',
                               'length' => 4, 'prefix' => 'T']),
            'name' => 'Cons Dr spécialiste',
            'montant' => '10000'
        ]);
    }
}
