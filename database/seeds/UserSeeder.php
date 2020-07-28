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
             'age' => 32,
             'genre' => 'M',
             'cni' => '345/536',
             'name' => Str::random(10),
             'email' => 'hurd@hurd.com',
             'role' => 'admin',
             'password' => Hash::make('hurdmach'),
         ]);
    }
}
