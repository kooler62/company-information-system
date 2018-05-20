<?php

use Illuminate\Database\Seeder;

class BusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
            'brand' => 'Mercedes Sprinter',
            'engine' => '190 л. с',
            'color' => 'white',
            'transmission' => 'Автомат',
            'production_year' => '2018-05-19',
            'man_capacity' => '20',
            'make_now' => '0',
            'workshop_id' => '1',
        ]);
        DB::table('buses')->insert([
            'brand' => 'Богдан A091',
            'engine' => '10 л. с',
            'color' => 'жовтий',
            'transmission' => 'Механіка',
            'production_year' => '2007-03-14',
            'man_capacity' => '250',
            'make_now' => '0',
            'workshop_id' => '2',
        ]);
        DB::table('buses')->insert([
            'brand' => 'Man ng',
            'engine' => '150 л. с',
            'color' => 'black',
            'transmission' => 'Механіка',
            'production_year' => '2018-05-19',
            'man_capacity' => '50',
            'make_now' => '1',
            'workshop_id' => '1',
        ]);
    }
}
