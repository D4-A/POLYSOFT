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
            'name' => 'pediatrie'
        ]);
    }
}
