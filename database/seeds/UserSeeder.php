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
             'service_id' => 'S004',
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
         DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S007',
             'fonction_id' => 'F002',
             'name' => 'IRAGIRE',
             'prenom' => 'Betty',
             'tel' => 79555655,
             'adresse' => 'NYAKABIGA',
             'ans_naiss' => '1993-07-09',
             'genre' => 'Feminin',
             'cni' => '531.205/4721',
             'email' => 'betty@gmail.com',
             'password' => Hash::make('betty'),
         ]);
         DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S001',
             'fonction_id' => 'F005',
             'name' => 'IRANZI',
             'prenom' => 'Romeo',
             'tel' => 71114890,
             'adresse' => 'Kanyosha',
             'ans_naiss' => '1991-10-29',
             'genre' => 'Masculin',
             'cni' => '553.265.78/5401',
             'email' => 'romeo@gmail.com',
             'password' => Hash::make('romeo'),
         ]);
         DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S001',
             'fonction_id' => 'F006',
             'name' => 'KENGURUKA',
             'prenom' => 'Elsa',
             'tel' => 75885958,
             'adresse' => 'NGAGARA',
             'ans_naiss' => '2000-01-21',
             'genre' => 'Feminin',
             'cni' => '554.535.88/4791',
             'email' => 'elsa@gmail.com',
             'password' => Hash::make('elsa'),
         ]);
             DB::table('users')->insert([
             'id' => IdGenerator::generate
                             (['table' => 'users',
                               'length' => 5, 'prefix' => 'US']),
             'service_id' => 'S005',
             'fonction_id' => 'F004',
             'name' => 'IRANKUNDA',
             'prenom' => 'Claude',
             'tel' => 71555488,
             'adresse' => 'JABE',
             'ans_naiss' => '1990-10-01',
             'genre' => 'Masculin',
             'cni' => '554.245/497',
             'email' => 'claude@gmail.com',
             'password' => Hash::make('claude'),
         ]);
    }
}
