<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S001',
             'fonction_id' => 'F001',
             'name' => 'NAHIMANA',
             'prenom' => 'Alexis',
             'tel' => 79300300,
             'adresse' => 'kibenga',
             'ans_naiss' => '1976-04-24',
             'genre' => 'Masculin',
             'cni' => '345.236/5365',
             'email' => 'alexis@gmail.com',
             'password' => Hash::make('alexis'),
         ]);
         DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S002',
             'fonction_id' => 'F002',
             'name' => 'BIGIRIMANA',
             'prenom' => 'Eric',
             'tel' => 72400400,
             'adresse' => 'kigobe',
             'ans_naiss' => '1982-02-29',
             'genre' => 'Masculin',
             'cni' => '658.235/4731',
             'email' => 'eric@gmail.com',
             'password' => Hash::make('eric'),
         ]);
    }
}
