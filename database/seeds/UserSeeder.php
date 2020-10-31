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
             'service_id' => 'S001',
             'fonction_id' => 'F001',
             'name' => 'Fleury',
             'prenom' => 'Guy',
             'tel' => 22222,
             'adresse' => 'kib',
             'ans_naiss' => '1997',
             'genre' => 'M',
             'cni' => '345/536',
             'email' => 'guy@gnu.org',
             'password' => Hash::make('hurdmach'),
         ]);
         DB::table('users')->insert([
             'service_id' => 'S002',
             'fonction_id' => 'F002',
             'name' => 'Nelly',
             'prenom' => 'Ken',
             'tel' => 22,
             'adresse' => 'kibenga',
             'ans_naiss' => '1995',
             'genre' => 'M',
             'cni' => '345',
             'email' => 'ken@gnu.org',
             'password' => Hash::make('hurdmach'),
         ]);
    }
}
