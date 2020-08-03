<?php

use Illuminate\Database\Seeder;

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
             'service_id' => 1,
             'fonction_id' => 1,
             'prenom' => Str::random(10),
             'tel' => 22222,
             'adresse' => 'kib',
             'ans_naiss' => '1997',
             'genre' => 'M',
             'cni' => '345/536',
             'name' => Str::random(10),
             'email' => 'hurd@hurd.com',
             'password' => Hash::make('hurdmach'),
         ]);
         DB::table('users')->insert([
             'service_id' => 1,
             'fonction_id' => 2,
             'prenom' => Str::random(10),
             'tel' => 22,
             'adresse' => 'kibenga',
             'ans_naiss' => '1995',
             'genre' => 'M',
             'cni' => '345',
             'name' => Str::random(10),
             'email' => 'a@a.com',
             'password' => Hash::make('hurdmach'),
         ]);
    }
}
