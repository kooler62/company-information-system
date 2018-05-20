<?php

use Illuminate\Database\Seeder;

class LorryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('lorries')->insert([
            'brand' => 'MAN TGL',
            'engine' => '200 л. с',
            'color' => 'white',
            'transmission' => 'Механіка',
            'production_year' => '2017-02-04',
            'wheel' => '3x6',
            'dump_truck' => 'Назад',
            'carrying' => '4 т',
            'make_now' => '0',
            'workshop_id' => '1',
        ]);
        Db::table('lorries')->insert([
            'brand' => 'MAN TGS',
            'engine' => '200 л. с',
            'color' => 'white',
            'transmission' => 'Механіка',
            'production_year' => '2007-02-04',
            'wheel' => '3x6',
            'dump_truck' => 'Назад',
            'carrying' => '2 т',
            'make_now' => '0',
            'workshop_id' => '2',
        ]);
    }
}
