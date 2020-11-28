<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Administration'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Urgence'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Consultation generale'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Petite Chirugie'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Laboratoire'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Pharmacie'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Pédiatrie'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Gynecologie'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Chirugie'
        ]);
        DB::table('services')->insert([
            'id' => IdGenerator::generate
                             (['table' => 'services',
                               'length' => 4, 'prefix' => 'S']),
            'name' => 'Hospitalisation'
        ]);
    }
}
